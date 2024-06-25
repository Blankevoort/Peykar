<template>
  <div>
    <!-- Badge -->
    <div v-if="badge" class="relative-position">
      <q-badge
        :class="[
          badgeClass,
          'text-white',
          'text-bold',
          'br-0',
          'z-top',
          'q-py-xs',
        ]"
        :style="badgeStyle"
      >
        {{ progressValue }}%
      </q-badge>
    </div>

    <div class="q-py-md">
      <!-- Title  -->

      <div class="row items-center">
        <div :class="titleClass">{{ title }}</div>

        <q-space />

        <div v-if="!showButton" class="text-primary row">
          <img
            src="https://jobvision.ir/assets/images/add-circle-primary.svg"
            style="width: 16px; height: 18px"
          />
          <div class="q-pl-sm">افزودن</div>
        </div>

        <div v-if="!disableEditButton && showButton">
          <div class="text-grey-7 row items-center">
            <img
              src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
            />
            <div class="q-pl-sm">ویرایش</div>
          </div>
        </div>
      </div>

      <!-- Design -->

      <slot></slot>
    </div>
  </div>
</template>

<script>
import { computed, defineComponent } from "vue";
import { useQuasar } from "quasar";

export default defineComponent({
  props: {
    progressValue: {
      type: Number,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
    showButton: {
      type: Boolean,
      default: true,
    },
    disableEditButton: {
      type: Boolean,
      default: false,
    },
    badge: {
      type: Boolean,
      default: true,
    },
  },

  setup(props) {
    const $q = useQuasar();

    const badgeClass = computed(() => {
      if (props.progressValue === 0) {
        return "danger-status-badge";
      } else if (props.progressValue === 100) {
        return "status-badge";
      }
      return "danger-status-badge";
    });

    const badgeStyle = computed(() => {
      if (props.progressValue === 0) {
        return { backgroundColor: "#eb4969", width: "39px" };
      } else if (props.progressValue === 100) {
        return { backgroundColor: "#45c26f", width: "39px" };
      }
      return { backgroundColor: "#eb4969", width: "39px" };
    });

    const titleClass = computed(() => {
      return $q.screen.gt.sm ? "text-h6 text-bold" : "text-bold";
    });

    return {
      badgeClass,
      badgeStyle,
      titleClass,
    };
  },
});
</script>

<style scoped>
.q-badge {
  border-radius: 0;
}

.status-badge:after {
  content: "";
  display: block;
  width: 0;
  height: 0;
  border-bottom: 20px solid transparent;
  border-top: 20px solid transparent;
  border-right: 6px solid #45c26f;
  position: absolute;
  top: 4px;
  transform: rotate(270deg);
  left: 16px;
}

.danger-status-badge:after {
  content: "";
  display: block;
  width: 0;
  height: 0;
  border-bottom: 20px solid transparent;
  border-top: 20px solid transparent;
  border-right: 6px solid #eb4969;
  position: absolute;
  top: 4px;
  transform: rotate(270deg);
  left: 16px;
}
</style>
