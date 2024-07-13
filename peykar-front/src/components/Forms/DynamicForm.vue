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
        <div
          v-for="(field, index) in formFields"
          :key="index"
          class="field-wrapper"
        >
          <div class="q-pb-xs">{{ field.label }}</div>

          <component
            :is="getComponent(field)"
            v-model="formData[field.name]"
            :options="field.options"
            :class="field.class"
            :type="field.type === 'textarea' ? 'textarea' : undefined"
            outlined
            :counter="field.type === 'textarea'"
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
      console.log(formData.value);
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
      getComponent,
      handleSubmit,
      handleCancel,
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
</style>
