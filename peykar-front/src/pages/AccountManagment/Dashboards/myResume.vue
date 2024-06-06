<template>
  <q-page class="row justify-center" style="background-color: #f8f9fa">
    <div class="col-xs-12 col-sm-10 col-md-12 col-lg-8 col-xl-8">
      <div :class="containerClass">
        <!-- Preferred Resume Design Options -->

        <div
          class="col-xs-4 col-sm-4 col-md-4 col-lg-6 col-xl-6 row items-center text-grey-7"
        >
          <q-icon class="q-pr-xs" name="visibility" size="20px" />

          <div class="q-px-xs gt-sm">نحوه نمایش رزومه به:</div>

          <q-select
            dense
            borderless
            v-model="preferred"
            :options="preferredOptions"
          />
        </div>

        <!-- Share And Download Resume -->

        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-6 col-xl-6 text-right">
          <q-btn
            flat
            dense
            icon="cloud_download"
            color="grey-7"
            label="دانلود رزومه"
            class="q-px-xl"
          />

          <q-btn
            flat
            dense
            icon="share"
            color="grey-7"
            label="اشتراک گذاری رزومه "
            class="gt-sm"
          />

          <q-btn flat dense icon="share" color="grey-7" class="lt-md" />
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  computed: {
    containerClass() {
      return {
        "bg-white": this.$q.screen.gt.sm,
        "q-pa-md": true,
        "full-width": true,
        row: true,
        "justify-between": true,
        "items-center": true,
      };
    },
  },

  setup() {
    const preferred = ref("خودم");
    return {
      preferred,
      preferredOptions: ["خودم", "کارفرما"],
    };
  },
};
</script>

<style scoped>
.active-tabs {
  background-color: #5660f2 !important;
  color: white !important;
}

.active-tab {
  border-left: 3px solid;
  border-color: #5660f2 !important;
  border-top-left-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
  font-weight: bold !important;
}

.active-sort-type {
  background-color: #5660f2 !important;
  color: white !important;
}

.custom-border {
  border-radius: 10px !important;
  border: 2px solid #dde1e6;
}

.active-category {
  background: #4a4e57 !important;
  color: white !important;
}

.not-active-category {
  cursor: pointer;
  border-radius: 40px;
  background-color: #fff;
  border: 1px solid #e0e0e0;
  margin: 0 4px;
  padding: 8px 16px;
}
</style>
