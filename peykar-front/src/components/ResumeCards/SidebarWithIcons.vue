<template>
  <div class="row items-center q-pb-md" style="margin-top: 2rem">
    <q-item style="background-color: white; border-radius: 8px" class="q-my-xs">
      <q-item-section v-if="!small" avatar>
        <div
          class="br-10 q-py-lg q-px-sm"
          style="background-color: #f6f7f9 !important"
        >
          <div>
            <img
              src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
            />
          </div>

          <img
            class="q-pt-sm"
            src="https://jobvision.ir/assets/images/delete-secondary.svg"
          />
        </div>
      </q-item-section>

      <q-item-section v-else avatar>
        <div
          class="br-10 q-py-md q-px-sm"
          style="background-color: #f6f7f9 !important"
        >
          <div>
            <img
              src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
            />
          </div>

          <img
            class="q-pt-xs"
            src="https://jobvision.ir/assets/images/delete-secondary.svg"
          />
        </div>
      </q-item-section>

      <slot> </slot>
    </q-item>
  </div>
</template>

<script>
export default {
  props: {
    small: {
      type: Boolean,
      default: false,
    },
  },
};
</script>

<style scoped>
.q-item {
  padding: 0;
}
</style>
