<template>
  <q-page class="row justify-center">
    <div class="col-8 row justify-between content-center items-center">
        <div class="col-6 text-weight-bold" style="font-size: 40px">
          <div class="row" style="width: 350px">
            <span class="text-primary">39,271</span> آگهی شغلی در
            <span class="text-primary">454</span> شهر
          </div>
        </div>

        <div class="col-6">
          <div class="row justify-end">
            <img
              style="width: 350px; height: 350px"
              src="../assets/IR-Map.svg"
              alt="iranMap"
            />
          </div>
        </div>

        <div class="text-weight-bold q-my-md" style="font-size: 20px;">دنبال چه شغلی می‌گردید؟</div>

      <div class="col-12 row justify-between content-center ">
        <q-select
          class="col-4 q-px-sm"
          outlined
          v-model="model"
          :options="options"
          label="عنوان شغلی یا شرکت"
        />

        <q-select
          class="col-3 q-px-sm"
          outlined
          v-model="model"
          :options="options"
          label="گروه شغلی"
        />

        <q-select
          class="col-3 q-px-sm"
          outlined
          v-model="model"
          :options="options"
          label="شهر"
        />

        <q-btn
          color="primary"
          label="جستجو در مشاغل"
          to="/jobs"
          class="col-2 q-px-sm"
        />
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    return {
      model: ref(null),
      options: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
    };
  },
};
</script>
