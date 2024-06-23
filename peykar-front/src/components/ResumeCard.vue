<template>
  <div class="bg-white br-10">
    <BadgeAndTitle
      :progressValue="progressValue"
      :title="title"
      :showButton="showButton"
      :disableEditButton="disableEditButton"
    >
      <!-- Content -->
      
      <SidebarWithIcons v-if="hasModel">
        <q-item-section class="q-gutter-y-sm">
          <slot></slot>
        </q-item-section>
      </SidebarWithIcons>

      <div class="q-pt-sm text-grey-7" v-if="!hasModel">
        <!-- User doesn't have Model -->

        <div class="row items-center q-gutter-sm">
          <q-checkbox size="sm" :model-value="checkboxModel" @update:model-value="updateCheckboxModel" />

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
import BadgeAndTitle from "./ResumeBadgeAndTitle.vue";
import SidebarWithIcons from "./SidebarWithIcons.vue";
import RadioGroupWithConditionalSlot from "./RadioGroupWithConditionalSlot.vue";

export default {
  components: {
    BadgeAndTitle,
    SidebarWithIcons,
    RadioGroupWithConditionalSlot,
  },

  props: {
    title: String,
    noModel: String,
    hasModel: Boolean,
    showButton: Boolean,
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
</style>
