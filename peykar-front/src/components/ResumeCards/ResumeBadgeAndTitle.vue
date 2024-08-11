<template>
  <div>
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
      <div class="row items-center">
        <div :class="titleClass">{{ title }}</div>

        <q-space />

        <div
          v-if="(!showButton && isTrue) || disableEditButton"
          class="text-primary row hover-effect"
          @click="emitAdd"
        >
          <img
            src="https://jobvision.ir/assets/images/add-circle-primary.svg"
            style="width: 16px; height: 18px"
          />

          <div class="q-pl-sm">افزودن</div>
        </div>

        <div v-if="!disableEditButton && showButton" @click="emitEdit">
          <div class="text-grey-7 row items-center hover-effect">
            <img
              src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
            />

            <div class="q-pl-sm">ویرایش</div>
          </div>
        </div>
      </div>

      <slot></slot>
    </div>

    <!-- Dialog Component -->

    <FormDialog
      v-if="showFormDialog"
      :id="formDialogId"
      :action="formDialogAction"
      :item="itemid"
      @close-dialog="closeFormDialog"
      @dialog-closed="resetDialog"
      @hide="resetDialog"
    />
  </div>
</template>

<script>
import { useQuasar } from "quasar";
import { computed, defineComponent, ref } from "vue";
import FormDialog from "../Forms/DynamicForm.vue";

export default defineComponent({
  props: {
    id: {
      type: String,
      required: true,
    },
    progressValue: {
      type: Number,
      required: true,
    },
    itemid: {
      type: Object,
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
      default: true,
    },
    badge: {
      type: Boolean,
      default: true,
    },
    isTrue: {
      type: Boolean,
      default: false,
    },
  },

  components: {
    FormDialog,
  },

  setup(props) {
    const $q = useQuasar();
    const formDialogId = ref("");
    const formDialogAction = ref("");
    const showFormDialog = ref(false);

    const isAddMode = computed(() => {
      return props.progressValue === 0;
    });

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

    function emitAdd() {
      openDialog("add");
    }

    function emitEdit() {
      openDialog("edit");
    }

    const openDialog = (action) => {
      formDialogId.value = props.id;
      formDialogAction.value = action;
      if (action === "delete") {
        console.log("Attempting to edit/delete item with data:", props.itemid);
      }
      showFormDialog.value = true;
    };

    function closeFormDialog() {
      showFormDialog.value = false;
    }

    function resetDialog() {
      showFormDialog.value = false;
      formDialogId.value = "";
      formDialogAction.value = "";
    }

    return {
      emitAdd,
      emitEdit,
      badgeClass,
      badgeStyle,
      titleClass,
      resetDialog,
      formDialogId,
      showFormDialog,
      closeFormDialog,
      formDialogAction,
      isAddMode,
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

.hover-effect {
  cursor: pointer;
}
</style>
