<template>
  <q-dialog persistent no-shake v-model="isDialogOpen" class="custom-dialog">
    <div class="dialog-container q-gutter-y-sm" :style="dialogContainerStyles">
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

      <div class="dialog-body q-mx-lg" :style="dialogBodyStyle">
        <div v-if="action === 'delete'" class="q-pt-md q-pb-xs text-grey-7">
          آیا از حذف این آیتم مطمئنید؟
        </div>

        <div class="full-width limited-height" v-else>
          <!-- Custom Component At The Top -->

          <div v-if="formComponent">
            <component :is="formComponent" :formData="formData" />
          </div>

          <!-- Field Types -->

          <div
            v-for="(field, index) in formFields"
            :key="index"
            class="field-wrapper"
          >
            <!-- Checkbox Inputs -->

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

            <!-- Multiple Inputs -->

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
                    :filled="subField.filled === true"
                    :type="
                      subField.type === 'textarea' ? 'textarea' : undefined
                    "
                    :counter="subField.type === 'textarea'"
                    outlined
                  />
                </div>
              </div>
            </div>

            <!-- Other Inputs -->

            <div v-else>
              <!-- Tips -->

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

                <q-btn
                  v-if="field.primaryTip"
                  flat
                  dense
                  size="sm"
                  class="q-ml-sm"
                >
                  <img
                    src="https://jobvision.ir/assets/images/home-page-services/question.svg"
                    style="width: 16px"
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
                      {{ field.primaryTip }}
                    </div>
                  </q-tooltip>
                </q-btn>
              </div>

              <!-- Other Type of Inputs -->

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

          <div v-if="formConfig.customBottomContent && bottomComponent">
            <component
              :is="bottomComponent"
              :formData="formData"
              @updateData="handleUpdate"
            />
          </div>
        </div>
      </div>

      <div v-if="!formConfig.actionButtons" class="dialog-footer q-pa-md">
        <q-card-section class="footer-content justify-end">
          <q-btn
            v-if="formConfig.CustomCancelButton !== false"
            flat
            color="grey-7"
            :label="action === 'delete' ? 'خیر' : 'انصراف'"
            @click="handleCancel"
          />

          <q-btn
            :color="action === 'delete' ? 'negative' : 'primary'"
            :label="action === 'delete' ? 'بله، مطمئنم' : submitButtonLabel"
            @click="handleSubmit"
          />
        </q-card-section>
      </div>
    </div>
  </q-dialog>
</template>

<script>
import { formConfigs } from "./inputs";
import { defineComponent, onMounted, ref, watch } from "vue";
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

import { api } from "src/boot/axios";
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
    item: {
      type: Object,
      default: () => ({}),
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
      switch (this.action) {
        case "add":
          return "افزودن";
        case "edit":
          return "ویرایش";
        case "delete":
          return "حذف";
        default:
          return "";
      }
    },
    submitButtonLabel() {
      return this.action === "add"
        ? "افزودن"
        : this.formConfig.customDoneButton || "ذخیره تغییرات";
    },
    dialogBodyStyle() {
      if (this.action === "delete") {
        return {};
      }
      return {
        display: "flex",
        justifyContent: "center",
        alignItems: "center",
      };
    },
  },

  setup(props, { emit }) {
    const user = ref({});
    const formData = ref({});
    const formTitle = ref("");
    const formFields = ref([]);
    const isDialogOpen = ref(true);
    const formComponent = ref(null);
    const bottomComponent = ref(null);
    const formConfig = ref({});

    onMounted(async () => {
      try {
        const response = await api.get("api/user-cv");
        user.value = response.data.data;
      } catch (error) {
        console.error("Error fetching user data:", error);
      }
    });

    const getFormFieldValue = (path) => {
      return getNestedValue(user.value, path);
    };

    const setFormFieldValue = (path, value) => {
      const [resource, id] = path.split(".");

      api
        .patch(`api/user-cv/${resource}/${id}`, { [resource]: value })
        .then(() => {
          console.log(`Updated ${resource} at path ${path}`);
        })
        .catch((error) => {
          console.error(`Error updating ${resource}:`, error);
        });
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

          if (config.customBottomContent) {
            bottomComponent.value = (await config.bottomComponent()).default;
          } else {
            bottomComponent.value = null;
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

    function unwrapProxy(proxy) {
      return JSON.parse(JSON.stringify(proxy));
    }

    function deepEqual(obj1, obj2) {
      if (obj1 === obj2) return true;

      if (
        typeof obj1 !== "object" ||
        typeof obj2 !== "object" ||
        obj1 == null ||
        obj2 == null
      ) {
        return false;
      }

      const keys1 = Object.keys(obj1);
      const keys2 = Object.keys(obj2);

      if (keys1.length !== keys2.length) {
        return false;
      }

      for (let key of keys1) {
        if (!keys2.includes(key) || !deepEqual(obj1[key], obj2[key])) {
          return false;
        }
      }

      return true;
    }

    function unsetNestedValue(object, path) {
      const keys = path.split(".");
      const lastKey = keys.pop();
      const lastObject = keys.reduce((obj, key) => obj && obj[key], object);

      if (lastObject && Array.isArray(lastObject)) {
        const indexToDelete = parseInt(lastKey);
        if (!isNaN(indexToDelete)) {
          lastObject.splice(indexToDelete, 1);
        }
      } else if (lastObject && lastKey in lastObject) {
        delete lastObject[lastKey];
      }
    }

    function findPathToObject(obj, target, path = "") {
      if (deepEqual(obj, target)) {
        return path;
      }
      if (typeof obj === "object" && obj !== null) {
        for (const key in obj) {
          const fullPath = path ? `${path}.${key}` : key;
          const result = findPathToObject(obj[key], target, fullPath);
          if (result) return result;
        }
      }
      return null;
    }

    const handleSubmit = async () => {
      console.log("Submitted Form Data:");

      formFields.value.forEach((field) => {
        const fieldName = field.name;
        const fieldValue = formData.value[fieldName];
        console.log(`${fieldName}: ${fieldValue}`);
      });

      try {
        const sectionName =
          formConfig.value.name || props.id || "unknown-section";
        const url = `api/user-cv/${sectionName}`;

        if (props.action === "add" || props.action === "update") {
          const dataToSubmit = formFields.value.reduce((acc, field) => {
            const fieldName = field.name;
            const fieldValue = formData.value[fieldName];
            acc[fieldName] = fieldValue;
            return acc;
          }, {});

          if (props.action === "add") {
            console.log("Posting data to:", url);
            await api.post(url, dataToSubmit);
          } else if (props.action === "update") {
            const itemId = props.item?.id;
            if (itemId) {
              console.log("Patching data to:", `${url}/${itemId}`);
              await api.patch(`${url}/${itemId}`, dataToSubmit);
            } else {
              console.warn("Update action requested but no item ID provided.");
            }
          }
        } else if (props.action === "delete") {
          const itemId = props.item?.id;
          if (itemId) {
            console.log("Deleting item at:", `${url}/${itemId}`);
            await api.delete(`${url}/${itemId}`);
          } else {
            console.warn("Delete action requested but no item ID provided.");
          }
        }

        emit("close-dialog");
        location.reload();
      } catch (error) {
        console.error("Error updating data:", error);
      }
    };

    const handleCancel = () => {
      isDialogOpen.value = false;
      emit("close-dialog");
    };

    return {
      formData,
      formTitle,
      formFields,
      formConfig,
      getComponent,
      handleSubmit,
      handleCancel,
      isDialogOpen,
      formComponent,
      bottomComponent,
    };
  },
  handleUpdate(data) {
    this.formData[data.field] = data.value;
  },
});
</script>

<style>
.dialog-container {
  display: flex;
  flex-direction: column;
  background-color: white;
  border-radius: 18.5px !important;
  max-height: 600px !important;
}

.dialog-container::-webkit-scrollbar {
  width: 0px;
}

.limited-height {
  max-height: 400px;
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
