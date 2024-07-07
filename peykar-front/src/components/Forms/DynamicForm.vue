<template>
  <q-dialog v-model="isDialogOpen">
    <q-card>
      <q-card-section>
        <div class="text-h6">{{ formTitle }}</div>
      </q-card-section>

      <q-card-section>
        <q-form @submit="handleSubmit" class="q-gutter-md">
          <component
            v-for="(field, index) in formFields"
            :key="index"
            :is="getComponent(field)"
            v-model="formData[field.name]"
            :label="field.label"
            :options="field.options"
            :class="field.class"
          ></component>

          <q-btn label="Submit" type="submit" color="primary" />
        </q-form>
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
  QForm,
  QInput,
  QBtn,
  QCheckbox,
  QSelect,
} from "quasar";

export default defineComponent({
  components: {
    QDialog,
    QCard,
    QCardSection,
    QForm,
    QInput,
    QCheckbox,
    QSelect,
    QBtn,
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

    watch(
      () => props.id,
      (newId) => {
        if (newId && formConfigs[newId]) {
          const config = formConfigs[newId];
          formTitle.value = config.title;
          formFields.value = config.fields;
          formData.value = config.fields.reduce((acc, field) => {
            acc[field.name] = "";
            return acc;
          }, {});
          console.log("Form fields initialized: ", formFields.value);
          console.log("Form data initialized: ", formData.value);
        }
      },
      { immediate: true }
    );

    const getComponent = (field) => {
      switch (field.type) {
        case "input":
          return "q-input";
        case "textarea":
          return "q-textarea";
        case "checkbox":
          return "q-checkbox";
        case "select":
          return "q-select";
        default:
          return "q-input";
      }
    };

    const handleSubmit = () => {
      console.log(formData.value);
      emit("close-dialog");
    };

    return {
      isDialogOpen,
      formData,
      formFields,
      formTitle,
      getComponent,
      handleSubmit,
    };
  },
});
</script>

<style>
.custom-input {
  margin-bottom: 10px;
}

.custom-textarea {
  margin-bottom: 20px;
}
</style>
