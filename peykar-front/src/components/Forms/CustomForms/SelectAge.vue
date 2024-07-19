<template>
  <div>
    <span>{{ label }}</span>
    <q-btn-dropdown
      content-class="text-center"
      no-caps
      unelevated
      class="full-width q-py-sm q-mt-sm"
      color="primary"
    >
      <template v-slot:label>
        <div class="full-width text-left">
          <div>انتخاب تاریخ</div>
        </div>
      </template>
      <q-date
        minimal
        v-model="internalValue"
        mask="YYYY/MM/DD"
        calendar="persian"
      />
    </q-btn-dropdown>
  </div>
</template>

<script>
export default {
  props: {
    label: String,
    modelValue: String,
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
