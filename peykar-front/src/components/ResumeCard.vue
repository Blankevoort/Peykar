<template>
  <div class="bg-white br-10 q-px-sm">
    <BadgeAndTitle
      :progressValue="progressValue"
      :title="title"
      :showButton="showButton"
      :disableEditButton="disableEditButton"
      :badge="showBadge"
    >
      <!-- Content -->

      <SidebarWithIcons
        :additional="isAdditional"
        :small="isSmall"
        :large="isLarge"
        v-if="hasModel"
      >
        <div class="q-pl-xs">
          <slot> </slot>
        </div>
      </SidebarWithIcons>

      <div class="q-pt-sm text-grey-7" v-if="!hasModel && !noCheckbox">
        <!-- User doesn't have Model -->

        <div class="row items-center q-gutter-sm">
          <q-checkbox
            size="sm"
            :model-value="checkboxModel"
            @update:model-value="updateCheckboxModel"
          />

          <div>{{ noModel }}</div>
        </div>

        <!-- Only University Education -->

        <div class="q-gutter-y-sm q-pl-md q-pt-sm" v-if="educationSection">
          <RadioGroupWithConditionalSlot
            :model="!checkboxModel"
            modelProp="diploma"
            :options="diplomaOptions"
            @update:modelValue="updateModel"
          />
        </div>
      </div>
    </BadgeAndTitle>
  </div>
</template>

<script>
import { ref } from "vue";
import BadgeAndTitle from "./ResumeCards/ResumeBadgeAndTitle.vue";
import SidebarWithIcons from "./ResumeCards/SidebarWithIcons.vue";
import RadioGroupWithConditionalSlot from "./ResumeCards/RadioGroupWithConditionalSlot.vue";

export default {
  components: {
    BadgeAndTitle,
    SidebarWithIcons,
    RadioGroupWithConditionalSlot,
  },
  props: {
    title: String,
    noModel: String,
    isSmall: Boolean,
    isLarge: Boolean,
    hasModel: Boolean,
    badge: {
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
  setup() {
    const diploma = ref(false);

    const diplomaOptions = [
      { value: "دیپلم", label: "مدرک تحصیلی دیپلم دارم." },
      { value: "زیر دیپلم", label: "مدرک تحصیلی زیر دیپلم دارم." },
    ];

    const updateModel = (newValue) => {
      diploma.value = newValue;
    };

    const updateCheckboxModel = (newValue) => {
      checkboxModel.value = newValue;
    };

    return {
      diploma,
      updateModel,
      diplomaOptions,
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
