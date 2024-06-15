<template>
  <div class="q-gutter-y-xs">
    <div class="text-grey-7">{{ title }}</div>

    <div class="text-bold">{{ info }}</div>
  </div>
</template>

<script>export default {
  props: {
    title: {
      type: String,
      required: true,
    },
    info: {
      type: String,
      required: true,
    },
  },
};
</script>
