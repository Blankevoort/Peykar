<template>
  <q-dialog persistent no-shake v-model="isDialogOpen">
    <div class="bg-white" style="border-radius: 18.5px">
      <div class="q-px-lg q-py-md">
        <q-card-section class="flex justify-center">
          <img
            src="https://jobvision.ir/assets/images/close-gray.svg"
            @click="handleCancel"
            class="absolute-top-right"
            style="width: 25px; height: 25px; cursor: pointer"
          />

          <div class="text-h6 text-bold">{{ formTitle }}</div>
        </q-card-section>

        <div class="q-gutter-y-md q-px-sm">
          <div v-if="formComponent">
            <component :is="formComponent" :formData="formData" />
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
    const formComponent = ref(null);

    watch(
      () => props.id,
      async (newId) => {
        if (newId && formConfigs[newId]) {
          const config = formConfigs[newId];
          formTitle.value = config.title;
          formFields.value = config.fields;
          formData.value = config.fields.reduce((acc, field) => {
            acc[field.name] = "";
            return acc;
          }, {});
          if (config.customContent) {
            formComponent.value = (await config.component()).default;
          } else {
            formComponent.value = null;
          }
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
      formComponent,
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
