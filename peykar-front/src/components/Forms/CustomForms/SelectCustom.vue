<template>
  <div>
    <div class="text-grey-7">
      <span>{{ label }}</span>
    </div>

    <div class="q-pt-sm full-width">
      <q-select
        v-model="internalValue"
        :options="filteredOptions"
        color="grey-8"
        outlined
        clearable
        use-input
        use-chips
        :multiple="multiple"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    label: String,
    modelValue: [String, Array],
    options: Array,
    multiple: {
      type: Boolean,
      default: false,
    },
  },
  emits: ["update:modelValue"],
  data() {
    return {
      filteredOptions: this.options,
    };
  },
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
  watch: {
    options: {
      handler(newOptions) {
        this.filteredOptions = newOptions;
      },
      immediate: true,
    },
  },
};
</script>
