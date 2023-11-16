<template>
  <q-page style="background-color: #f8f9fa"> </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const editBTN = ref(false);
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

    function editToggle() {
      if (editBTN.value == false) {
        editBTN.value = true;
      } else {
        editBTN.value = false;
      }
    }

    return {
      editToggle,
      editBTN,
      preferred,
      options,
      model: ref(null),
      val: ref(true),
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
  border-radius: 0;
  width: 39px;
  height: 22px;
}

.q-tab-panels {
  background-color: transparent;
}

.q-tab-panel {
  padding: 0;
}

.q-item {
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
</style>
