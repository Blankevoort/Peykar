<template>
  <div class="bg-white br-10">
    <!-- Content -->

    <SidebarWithIcons
      :additional="isAdditional"
      :small="isSmall"
      :large="isLarge"
      v-if="hasModel"
    >
      <div>
        <slot></slot>
      </div>
    </SidebarWithIcons>

    <div class="q-pt-sm text-grey-7" v-if="!hasModel && !noCheckbox">
      <!-- User doesn't have Model -->

      <div class="row items-center q-gutter-sm">
        <q-checkbox size="sm" v-model="localCheckboxModel" />
        <div>{{ noModel }}</div>
      </div>

      <!-- Only University Education -->

      <div class="q-gutter-y-sm q-pl-md q-pt-sm" v-if="educationSection">
        <RadioGroupWithConditionalSlot
          :model="!localCheckboxModel"
          modelProp="diploma"
          :options="diplomaOptions"
          @update:modelValue="updateModel"
        />
      </div>
    </div>
  </div>
</template>

<script>
import { ref, watch } from "vue";
import SidebarWithIcons from "./ResumeCards/SidebarWithIcons.vue";
import RadioGroupWithConditionalSlot from "./ResumeCards/RadioGroupWithConditionalSlot.vue";

export default {
  components: {
    SidebarWithIcons,
    RadioGroupWithConditionalSlot,
  },
  props: {
    id: String,
    title: String,
    noModel: String,
    isSmall: Boolean,
    isLarge: Boolean,
    hasModel: Boolean,
    showBadge: {
      type: Boolean,
      default: true,
    },
    noCheckbox: Boolean,
    showButton: Boolean,
    isAdditional: Boolean,
    progressValue: Number,
    checkboxModel: Boolean,
    educationSection: Boolean,
    disableEditButton: Boolean,
  },
  emits: ["update:checkboxModel"],

  setup(props, { emit }) {
    const localCheckboxModel = ref(props.checkboxModel);
    const diploma = ref(false);

    const diplomaOptions = [
      { value: "دیپلم", label: "مدرک تحصیلی دیپلم دارم." },
      { value: "زیر دیپلم", label: "مدرک تحصیلی زیر دیپلم دارم." },
    ];

    const updateModel = (newValue) => {
      diploma.value = newValue;
    };

    const updateCheckboxModel = (newValue) => {
      localCheckboxModel.value = newValue;
      emit("update:checkboxModel", newValue);
    };

    watch(
      () => props.checkboxModel,
      (newVal) => {
        localCheckboxModel.value = newVal;
      }
    );

    return {
      diploma,
      updateModel,
      diplomaOptions,
      localCheckboxModel,
      updateCheckboxModel,
    };
  },
};
</script>

<style scoped>
.br-10 {
  border-radius: 10px;
}
.q-item {
  padding: 0;
}
</style>
