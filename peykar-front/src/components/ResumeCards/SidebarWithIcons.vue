<template>
  <div class="row items-center q-pb-md" :style="marginTopStyle">
    <q-item
      style="background-color: white; border-radius: 8px"
      class="q-my-xs gt-xs"
    >
      <q-item-section avatar>
        <div :class="sectionClass" :style="sectionStyle">
          <div>
            <img
              src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
            />
          </div>

          <img
            class="q-pt-xs"
            :class="ptClass"
            src="https://jobvision.ir/assets/images/delete-secondary.svg"
          />
        </div>
      </q-item-section>

      <slot></slot>
    </q-item>
  </div>

  <div class="lt-sm">
    <slot></slot>

    <div class="flex items-center justify-center q-mt-md">
      <div
        class="row justify-center items-center q-gutter-x-md q-py-sm br-10"
        style="background-color: #f6f7f9 !important"
        :class="{ 'w-36': large }"
      >
        <img
          style="width: 16px; height: 16px"
          src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
        />
        <img
          style="height: 16px"
          class="q-pr-lg"
          src="https://jobvision.ir/assets/images/delete-secondary.svg"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    small: {
      type: Boolean,
      default: false,
    },
    large: {
      type: Boolean,
      default: false,
    },
    additional: {
      type: Boolean,
      default: false,
    },
  },

  computed: {
    marginTopStyle() {
      return {
        marginTop: this.additional ? "1.5rem" : "2rem",
      };
    },
    sectionClass() {
      return {
        "br-10 q-px-sm": true,
        "q-py-lg": this.small,
        "q-py-md": !this.small && !this.large,
      };
    },
    sectionStyle() {
      return {
        backgroundColor: "#f6f7f9 !important",
        paddingTop: this.large ? "30px" : "",
        paddingBottom: this.large ? "30px" : "",
      };
    },
    ptClass() {
      return {
        "q-pt-sm": this.small,
        "q-pt-md": this.large,
        "q-pt-xs": !this.small && !this.large,
      };
    },
  },
};
</script>

<style scoped>
.q-item {
  padding: 0;
}
</style>
