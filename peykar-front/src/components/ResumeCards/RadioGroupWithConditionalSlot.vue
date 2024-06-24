<template>
  <div>
    <div class="q-gutter-y-sm q-column" v-if="!model">
      <q-radio
        v-for="option in options"
        :key="option.value"
        v-model="localModel"
        :val="option.value"
        :label="option.label"
        size="sm"
      />
    </div>

    <div v-else>
      <slot></slot>
    </div>
  </div>
</template>

<script>
import { ref, watch } from "vue";

export default {
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
  setup(props, { emit }) {
    const localModel = ref("");

    watch(
      () => localModel.value,
      (newValue) => {
        emit("update:modelValue", { [props.modelProp]: newValue });
      }
    );

    return {
      localModel,
    };
  },
};
</script>

<style scoped>
.q-column {
  display: flex;
  flex-direction: column;
}
</style>
