<template>
  <div class="q-px-lg">
    <!-- Applications -->

    <div class="col- row items-center q-pt-sm q-px-sm q-mb-lg">
      <!-- Example of a software skill item -->

      <div class="col-">
        <div class="row">
          <div
            class="br-4 q-pa-xs text-white row items-center q-gutter-x-sm"
            style="background-color: #5c6573 !important"
          >
            <img
              style="width: 16px"
              src="https://jobvision.ir/assets/images/cv-maker/trash-white.svg"
            />

            <div class="row q-gutter-x-sm">
              <div class="text-bold">HTML & CSS</div>

              <q-separator class="q-py-xs" color="white" vertical />

              <div class="q-pr-sm">پیشرفته</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Search and dropdown -->

    <div>
      <q-input
        outlined
        clearable
        v-model="searchApp"
        placeholder="جستجوی نرم افزار"
      >
        <template v-slot:prepend>
          <q-icon class="q-pb-sm" name="search" />
        </template>
      </q-input>
    </div>

    <!-- Software categories and items -->

    <div
      class="full-width br-10 q-my-md"
      v-if="searchApp == ''"
      style="background: #f4f4f4"
      @click="openList = true"
    >
      <q-btn-dropdown
        color="black"
        class="q-py-md"
        flat
        unelevated
        :label="tab"
        v-model="openList"
      >
        <q-tabs
          v-model="tab"
          vertical
          indicator-color="transparent"
          style="width: 235px"
        >
          <q-tab name="نرم افزارهای آفیس" label="نرم افزارهای آفیس" />

          <q-separator inset />

          <q-tab
            name="نرم افزارها و زبان های برنامه نویسی / DevOps"
            label="نرم افزارها و زبان های برنامه نویسی / DevOps"
            style="text-wrap: wrap; text-align: start; text-transform: none"
          />

          <q-separator inset />

          <q-tab
            name="شبکه و سخت افزار / سیستم عامل"
            label="شبکه و سخت افزار / سیستم عامل"
          />
        </q-tabs>
      </q-btn-dropdown>

      <q-separator inset />

      <q-tab-panels
        class="q-py-md"
        v-model="tab"
        animated
        style="background: #f4f4f4"
      >
        <q-tab-panel name="نرم افزارهای آفیس" class="row">
          <!-- List of software items -->

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Word</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Excel</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Access</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Powerpoint</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Visio</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Project</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft One Note</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Outlook</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> MathType</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>
        </q-tab-panel>

        <q-tab-panel
          name="نرم افزارها و زبان های برنامه نویسی / DevOps"
          class="row"
        >
          <!-- List of software items -->

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Word</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Excel</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Access</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>
        </q-tab-panel>

        <q-tab-panel name="شبکه و سخت افزار / سیستم عامل" class="row">
          <!-- List of software items -->

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Word</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Excel</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Access</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Excel</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>

          <div class="addApplicationCards q-ma-xs">
            <span> Microsoft Access</span>

            <q-icon name="add" class="q-pl-sm" size="22px" />
          </div>
        </q-tab-panel>
      </q-tab-panels>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const tab = ref("نرم افزارهای آفیس");
    const searchApp = ref("");
    const openList = ref(false);

    return {
      tab,
      openList,
      searchApp,
    };
  },
};
</script>

<style scoped>
.addApplicationCards {
  background: #fff;
  border-radius: 40px;
  padding: 10px 16px;
  border: 1px solid #e0e0e0;
}

.justify-center,
.flex-center {
  justify-content: start;
}
</style>
