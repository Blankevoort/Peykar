<template>
  <q-dialog v-model="isDialogOpen">
    <q-card
      class="q-pa-md q-gutter-y-md"
      style="width: 800px; border-radius: 18.5px"
    >
      <q-card-section class="flex justify-center">
        <q-btn
          flat
          round
          dense
          icon="close"
          @click="isDialogOpen = false"
          class="absolute-top-right"
        />
        <div class="text-h6 text-bold">{{ formTitle }}</div>
      </q-card-section>

      <div class="q-gutter-y-md">
        <div v-if="customContent">
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
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
          <q-btn color="primary" label="ذخیره تغییرات" @click="handleSubmit" />
        </div>
      </q-card-section>
    </q-card>
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
      isDialogOpen,
      formData,
      formFields,
      formTitle,
      customContent,
      getComponent,
      handleSubmit,
      handleCancel,
    };
  },
});
</script>

<style>
.q-btn.absolute-top-right {
  position: absolute;
  top: 10px;
  right: 10px;
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
</style>
