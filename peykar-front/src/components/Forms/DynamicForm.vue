<template>
  <q-dialog persistent no-shake v-model="isDialogOpen">
    <div class="bg-white" style="border-radius: 18.5px">
      <div class="q-px-lg q-py-md">
        <q-card-section class="flex justify-center">
          <img
            src="https://jobvision.ir/assets/images/close-gray.svg"
            @click="isDialogOpen = false"
            class="absolute-top-right"
            style="width: 25px; height: 25px"
          />

          <div class="text-h6 text-bold">{{ formTitle }}</div>
        </q-card-section>

        <div class="q-gutter-y-md q-px-sm">
          <div v-if="customContent">
            <div class="q-pt-md">
              <div class="row justify-between items-center">
                <div class="col-xs-12 col-sm-8 row">
                  <q-avatar size="60px">
                    <q-img
                      src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
                    />
                  </q-avatar>

                  <div class="col-8 q-pl-md">
                    <div class="gt-sm text-grey-9">تصویر پروفایل</div>

                    <div class="text-grey-7 q-pb-sm">
                      ‌فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
                    </div>
                  </div>
                </div>

                <div class="col-xs-12 col-sm-4">
                  <q-btn
                    class="text-bold"
                    flat
                    color="primary"
                    label="بارگذاری تصویر پروفایل"
                    icon="upload"
                  />
                </div>
              </div>
            </div>
          </div>

          <div
            v-for="(field, index) in formFields"
            :key="index"
            class="field-wrapper"
          >
            <div class="q-pb-sm text-grey-8">
              {{ field.label }}

              <q-btn v-if="field.tip" flat dense size="sm" class="q-ml-sm">
                <img
                  src="https://jobvision.ir/assets/images/my-cv/tooltip-info.svg"
                />

                <q-tooltip
                  style="background-color: #333663"
                  anchor="center left"
                  self="center right"
                >
                  <div
                    class="q-pa-sm text-center"
                    style="font-size: 0.765625rem; max-width: 220px"
                  >
                    {{ field.tip }}
                  </div>
                </q-tooltip>
              </q-btn>
            </div>

            <component
              :is="getComponent(field)"
              v-model="formData[field.name]"
              :options="field.options"
              :type="field.type === 'textarea' ? 'textarea' : undefined"
              :counter="field.type === 'textarea'"
              outlined
            />
          </div>
        </div>

        <q-card-section class="q-pa-none">
          <div class="q-gutter-md flex justify-end">
            <q-btn flat color="grey-7" label="انصراف" @click="handleCancel" />

            <q-btn
              color="primary"
              label="ذخیره تغییرات"
              @click="handleSubmit"
            />
          </div>
        </q-card-section>
      </div>
    </div>
  </q-dialog>
</template>

<script>
import { defineComponent, ref, watch } from "vue";
import { formConfigs } from "./inputs";
import {
  QDialog,
  QCard,
  QCardSection,
  QInput,
  QCheckbox,
  QSelect,
  QBtn,
  QIcon,
  QTooltip,
} from "quasar";

export default defineComponent({
  components: {
    QDialog,
    QCard,
    QCardSection,
    QInput,
    QCheckbox,
    QSelect,
    QBtn,
    QIcon,
    QTooltip,
  },

  props: {
    id: {
      type: String,
      required: true,
    },
    action: {
      type: String,
      required: true,
    },
  },

  setup(props, { emit }) {
    const isDialogOpen = ref(true);
    const formData = ref({});
    const formFields = ref([]);
    const formTitle = ref("");
    const customContent = ref(false);

    watch(
      () => props.id,
      (newId) => {
        if (newId && formConfigs[newId]) {
          const config = formConfigs[newId];
          formTitle.value = config.title;
          formFields.value = config.fields;
          customContent.value = config.customContent || false;
          formData.value = config.fields.reduce((acc, field) => {
            acc[field.name] = "";
            return acc;
          }, {});
        }
      },
      { immediate: true }
    );

    const getComponent = (field) => {
      switch (field.type) {
        case "input":
        case "textarea":
          return "q-input";
        case "checkbox":
          return "q-checkbox";
        case "select":
          return "q-select";
        default:
          return "q-input";
      }
    };

    const handleSubmit = () => {
      emit("close-dialog");
    };

    const handleCancel = () => {
      isDialogOpen.value = false;
      emit("close-dialog");
    };

    return {
      formData,
      formTitle,
      formFields,
      getComponent,
      handleSubmit,
      handleCancel,
      isDialogOpen,
      customContent,
    };
  },
});
</script>

<style>
.q-btn.absolute-top-right {
  position: absolute;
}

.q-card-section.flex.justify-center {
  position: relative;
}

.field-wrapper {
  margin-bottom: 20px;
}

.q-field--outlined .q-field__control {
  border-radius: 10px;
}

.q-dialog__inner--minimized > div {
  max-width: none;
}

.q-field__bottom--animated {
  transform: translateY(100%);
  position: absolute;
  top: -50px;
  left: 0;
  right: 0;
  bottom: auto;
}
</style>
