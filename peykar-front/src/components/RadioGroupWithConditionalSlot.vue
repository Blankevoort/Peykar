<template>
  <div>
    <div v-if="!model">
      <div v-for="option in options" :key="option.value">
        <q-radio
          size="sm"
          v-model="$parent[modelProp]"
          :val="option.value"
          :label="option.label"
        />
      </div>
    </div>

    <div v-else>
      <slot></slot>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    model: {
      type: Boolean,
      required: true,
    },
    modelProp: {
      type: String,
      required: true,
    },
    options: {
      type: Array,
      required: true,
    },
  },
});
</script>
