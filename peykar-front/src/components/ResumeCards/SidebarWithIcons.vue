<template>
  <div>
    <div class="row items-center q-pb-md" :style="marginTopStyle">
      <q-item
        style="background-color: white; border-radius: 8px"
        class="q-my-xs gt-xs"
      >
        <q-item-section avatar>
          <div :class="sectionClass" :style="sectionStyle">
            <!-- Edit Button -->

            <div @click="openDialog('edit')">
              <img
                src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
              />
            </div>

            <!-- Delete Button -->

            <img
              class="q-pt-xs"
              :class="ptClass"
              src="https://jobvision.ir/assets/images/delete-secondary.svg"
              @click="openDialog('delete')"
            />
          </div>
        </q-item-section>

        <q-item-section>
          <slot></slot>
        </q-item-section>
      </q-item>
    </div>

    <div class="lt-sm">
      <slot></slot>

      <div class="flex items-center justify-center q-mt-md">
        <div
          class="row justify-center items-center q-gutter-x-md q-py-sm br-10"
          style="background-color: #f6f7f9 !important"
          :class="{ 'w-36': large || additional }"
        >
          <!-- Edit Button -->
          <img
            style="width: 16px; height: 16px"
            src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
            @click="openDialog('edit')"
          />

          <!-- Delete Button -->
          <img
            style="height: 16px"
            class="q-pr-lg"
            src="https://jobvision.ir/assets/images/delete-secondary.svg"
            @click="openDialog('delete')"
          />
        </div>
      </div>
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
import { defineComponent, ref } from "vue";
import FormDialog from "../Forms/DynamicForm.vue";

export default defineComponent({
  props: {
    id: {
      type: String,
      required: true,
    },
    itemid: {
      type: Object,
    },
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

  components: {
    FormDialog,
  },

  computed: {
    marginTopStyle() {
      return {
        marginTop: this.additional ? "1rem" : "2rem",
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

  setup(props) {
    const formDialogId = ref("");
    const formDialogAction = ref("");
    const showFormDialog = ref(false);

    const openDialog = (action) => {
      formDialogId.value = props.id;
      formDialogAction.value = action;
      console.log("Attempting to edit/delete item with data:", props.itemid.id);
      // if (action === "delete") {
      //   console.log("Attempting to edit/delete item with data:", props.itemid);
      // }
      showFormDialog.value = true;
    };

    const closeFormDialog = () => {
      showFormDialog.value = false;
    };

    const resetDialog = () => {
      showFormDialog.value = false;
      formDialogId.value = "";
      formDialogAction.value = "";
    };

    return {
      formDialogId,
      formDialogAction,
      showFormDialog,
      openDialog,
      closeFormDialog,
      resetDialog,
    };
  },
});
</script>

<style scoped>
.q-item {
  padding: 0;
}

.w-36 {
  width: 200px;
}
</style>
