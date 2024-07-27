<template>
  <div>
    <div class="text-grey-7">
      <span>{{ label }}</span>
    </div>

    <div class="q-pt-sm full-width">
      <q-select
        v-model="internalValue"
        :options="filteredOptions"
        color="primary"
        outlined
        clearable
        use-input
        @filter="filterOptions"
        :multiple="multiple"
      >
        <template v-slot:selected>
          <div
            class="q-pa-sm br-4"
            v-if="modelValue"
            style="background: #e0e0e0 !important"
          >
            {{ modelValue }}
          </div>
        </template>
      </q-select>
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
  methods: {
    filterOptions(val, update) {
      const needle = val.toLowerCase();
      update(() => {
        this.filteredOptions = this.options.filter((v) =>
          v.toLowerCase().includes(needle)
        );
      });
    },
  },
};
</script>
