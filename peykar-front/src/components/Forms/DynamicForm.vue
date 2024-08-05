<template>
  <q-dialog persistent no-shake v-model="isDialogOpen" class="custom-dialog">
    <div class="dialog-container" :style="dialogContainerStyles">
      <div class="dialog-header">
        <q-card-section class="header-content justify-center q-my-md q-mx-lg">
          <img
            src="https://jobvision.ir/assets/images/close-gray.svg"
            @click="handleCancel"
            class="absolute-top-right"
            style="width: 25px; height: 25px; cursor: pointer"
          />

          <div :class="mainTitle">{{ actionLabel }} {{ formTitle }}</div>
        </q-card-section>
      </div>

      <div class="dialog-body q-mx-md">
        <div v-if="formComponent">
          <component :is="formComponent" :formData="formData" />
        </div>

        <div
          v-for="(field, index) in formFields"
          :key="index"
          class="field-wrapper"
        >
          <div v-if="field.type === 'checkbox'" class="checkbox-container">
            <q-checkbox
              v-model="formData[field.name]"
              :label="field.label"
              class="checkbox"
            />

            <div v-if="field.tip" class="checkbox-tip">
              <q-btn flat dense size="sm">
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

            <div v-if="formData[field.name] && field.questionOnTrue">
              <div
                v-for="question in field.questionOnTrue"
                :key="question.title"
              >
                <div class="q-pb-sm text-grey-8">{{ question.title }}</div>

                <q-select
                  v-model="formData[question.name]"
                  :options="question.options"
                  style="min-width: 250px"
                  outlined
                />
              </div>
            </div>
          </div>

          <div v-else-if="field.type === 'multiple'" class="multiple-field">
            <div class="row">
              <div
                v-for="(subField, subIndex) in field.multiple"
                :key="subIndex"
                class="sub-field"
              >
                <div class="q-pb-sm text-grey-8">
                  {{ subField.label }}

                  <q-btn
                    v-if="subField.tip"
                    flat
                    dense
                    size="sm"
                    class="q-ml-sm"
                  >
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
                        {{ subField.tip }}
                      </div>
                    </q-tooltip>
                  </q-btn>
                </div>

                <component
                  :is="getComponent(subField)"
                  v-model="formData[subField.name]"
                  :options="subField.options"
                  :multiple="subField.multiple"
                  :type="subField.type === 'textarea' ? 'textarea' : undefined"
                  :counter="subField.type === 'textarea'"
                  outlined
                />
              </div>
            </div>
          </div>

          <div v-else class="field">
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
              :multiple="field.multiple === true"
              :counter="field.type === 'textarea'"
              :filled="field.filled === true"
              outlined
            />
          </div>
        </div>
      </div>

      <div
        v-if="!formConfig.actionButtons"
        class="dialog-footer q-mt-md q-pa-md"
      >
        <q-card-section class="footer-content justify-end">
          <q-btn
            v-if="formConfig.CustomCancelButton !== false"
            flat
            color="grey-7"
            label="انصراف"
            @click="handleCancel"
          />

          <q-btn
            color="primary"
            :label="submitButtonLabel"
            @click="handleSubmit"
          />
        </q-card-section>
      </div>
    </div>
  </q-dialog>
</template>

<script>
import { formConfigs } from "./inputs";
import { defineComponent, ref, watch } from "vue";
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

import { getNestedValue, setNestedValue } from "../../composables/storageUtils";

import SelectAge from "../Forms/CustomForms/SelectAge.vue";
import SelectCustom from "../Forms/CustomForms/SelectCustom.vue";
import SelectTab from "../Forms/CustomForms/SelectTab.vue";

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
    SelectAge,
    SelectCustom,
    SelectTab,
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

  computed: {
    dialogContainerStyles() {
      const config = formConfigs[this.id];
      let minWidth = "650px";

      if (config && config.width === "lg") {
        minWidth = "800px";
      }

      return {
        minWidth: this.$q.screen.gt.xs ? minWidth : "311px",
      };
    },
    mainTitle() {
      return {
        "font-13": this.$q.screen.lt.sm,
        "text-bold": true,
        "text-h6": true,
      };
    },
    actionLabel() {
      return this.action === "add" ? "افزودن" : "ویرایش";
    },
    submitButtonLabel() {
      return this.action === "add"
        ? "افزودن"
        : this.formConfig.customDoneButton || "ذخیره تغییرات";
    },
  },

  setup(props, { emit }) {
    const formData = ref({});
    const formTitle = ref("");
    const formFields = ref([]);
    const isDialogOpen = ref(true);
    const formComponent = ref(null);
    const formConfig = ref({});

    const getFormFieldValue = (path) => {
      const data = JSON.parse(localStorage.getItem("user") || "{}");
      return getNestedValue(data, path);
    };

    const setFormFieldValue = (path, value) => {
      const data = JSON.parse(localStorage.getItem("user") || "{}");
      setNestedValue(data, path, value);
      localStorage.setItem("user", JSON.stringify(data));
    };

    watch(
      () => props.id,
      async (newId) => {
        if (newId && formConfigs[newId]) {
          const config = formConfigs[newId];
          formConfig.value = config;
          formTitle.value = config.title;
          formFields.value = config.fields;
          formData.value = config.fields
            ? config.fields.reduce((acc, field) => {
                const value = getFormFieldValue(field.path);
                acc[field.name] = value !== null ? value : "";
                return acc;
              }, {})
            : {};
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
        case "select-age":
          return "SelectAge";
        case "select-custom":
          return "SelectCustom";
        case "select-tab":
          return "SelectTab";
        default:
          return "q-input";
      }
    };

    const handleSubmit = () => {
      if (props.action === "add" && formConfig.value.mainPath) {
        const newData = {};
        formFields.value.forEach((field) => {
          if (field.name) {
            newData[field.name] = formData.value[field.name];
          }
        });

        const data = JSON.parse(localStorage.getItem("user") || "{}");
        const arrayData = getNestedValue(data, formConfig.value.mainPath) || [];
        arrayData.push(newData);
        setNestedValue(data, formConfig.value.mainPath, arrayData);
        localStorage.setItem("user", JSON.stringify(data));
      } else {
        formFields.value.forEach((field) => {
          if (field.path) {
            setFormFieldValue(field.path, formData.value[field.name]);
          }
        });
      }

      emit("close-dialog");
      location.reload();
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
      formConfig,
    };
  },
});
</script>

<style>
.dialog-container {
  display: flex;
  flex-direction: column;
  height: auto;
  background-color: white;
  border-radius: 18.5px !important;
  max-height: 600px !important;
}

.dialog-footer {
  bottom: 0;
  box-shadow: 0 1rem 3rem #0000002d !important;
}

.header-content,
.footer-content {
  display: flex;
  padding-left: 10px;
  padding-right: 10px;
}

.close-btn {
  cursor: pointer;
}

.dialog-body {
  flex: 1;
  overflow-y: auto;
  padding: 0 10px;
}

.dialog-body::-webkit-scrollbar {
  width: 5px;
}

.dialog-body::-webkit-scrollbar-thumb {
  background: #979797;
}

.dialog-body::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.field-wrapper {
  margin-bottom: 20px;
}

.checkbox-container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.checkbox-tip {
  margin-left: 16px;
}

.multiple-field .sub-field {
  flex: 1;
  min-width: 200px;
  margin-right: 10px;
}
</style>
