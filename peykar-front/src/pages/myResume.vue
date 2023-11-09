<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center q-mx-xl">
      <!-- POV -->

      <div class="col-8 row items-center q-px-md bg-white br-10">
        <div>
          <q-icon size="20px" name="visibility" />
          <span class="q-px-sm"> نحوه نمایش رزومه به: </span>
        </div>

        <q-select v-model="preferred" :options="options" borderless>
          <template v-slot:selected>
            <div class="text-bold">{{ preferred.label }}</div>
          </template>
        </q-select>
      </div>
    </div>

    <div class="row justify-center q-px-xl">
      <div class="col-8 row justify-between q-my-lg">
        <div class="col-6 row justify-center">
          <div
            class="bg-white full-width row justify-between br-10 q-px-md q-pt-lg"
          >
            <div class="col-12" style="margin-top: -25px">
              <q-badge class="text-white" style="background-color: #45c26f">
                100%
              </q-badge>
              <div class="badge-bottom"></div>
            </div>

            <div class="text-h6 text-bold q-mt-md">درباره من</div>

            <q-btn flat class="text-grey-6 q-mt-md">
              <q-icon class="q-px-sm" name="edit" />

              ویرایش
            </q-btn>
          </div>
        </div>
        <div class="col-4 row justify-end">dsadsadsa</div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const preferred = ref({ label: "خودم", value: "me" });
    const options = ref([
      {
        label: "خودم",
        value: "me",
      },
      {
        label: "کارفرما",
        value: "employer",
      },
    ]);

    return {
      preferred,
      options,
      model: ref(null),
    };
  },
};
</script>

<style scoped>
.q-tab__label {
  font-size: 12px;
  line-height: 1.715em;
  font-weight: 500;
}

.q-badge {
  background-color: transparent;
  color: green;
}

.q-tab-panels {
  background-color: transparent;
}

.q-tab-panel {
  padding: 0;
}

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

.br-10 {
  border-radius: 10px !important;
}

.q-badge {
  border-radius: 0;
  width: 39px;
  height: 22px;
}

.badge-bottom {
  border-bottom: 20px solid transparent;
  border-top: 20px solid transparent;
  border-right: 9px solid #45c26f;
  position: absolute;
  top: 47%;
  left: 20%;
  transform: rotate(270deg);
}
</style>
