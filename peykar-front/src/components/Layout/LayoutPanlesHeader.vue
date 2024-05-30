<template>
  <div class="full-width row justify-between q-py-md">
    <div class="col-6" @click="$emit('update-tab', 'jobs')">
      <q-icon name="arrow_forward_ios" size="16px" />
      <q-btn class="text-bold" flat label="فرصت های شغلی" />
    </div>
    <div class="col-6 flex justify-end">
      <q-btn
        flat
        @click="$emit('toggle-drawer')"
        class="btn--no-hover button-effect"
        icon="close"
      />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    tab: String,
    drawer: Boolean,
  },
};
</script>
