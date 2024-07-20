<template>
  <div>
    <div class="text-grey-7 q-pb-sm">
      <span>{{ label }}</span>
    </div>
    <div class="q-pt-sm full-width gender-section">
      <q-tabs
        indicator-color="transparent"
        v-model="internalValue"
        no-caps
        active-class="active-tab"
      >
        <q-tab
          v-for="(option, index) in options"
          :key="index"
          :name="option.name"
          :label="option.label"
        />
      </q-tabs>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    label: String,
    modelValue: String,
    options: {
      type: Array,
      default: () => [],
    },
  },
  emits: ["update:modelValue"],
  computed: {
    internalValue: {
      get() {
        return this.modelValue;
      },
      set(value) {
        this.$emit("update:modelValue", value);
      },
    },
  },
};
</script>

<style scoped>
.active-tab {
  border-bottom: 3px solid;
  border-color: #5660f2 !important;
  border-bottom-right-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
}

.gender-section {
  border: 1px solid #eef0f4;
  border-radius: 4px;
  padding: 0rem 0.7rem;
}
</style>
