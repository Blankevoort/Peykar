<template>
  <div class="q-mt-lg">
    <div>
      <div class="q-pb-sm">شماره تماس</div>
      <q-input v-model="localContactNumber" filled />
    </div>

    <!-- Separator -->

    <div class="row items-center q-gutter-x-sm q-pt-xl">
      <div class="text-grey-7 col-">دریافت توصیه نامه</div>

      <q-separator class="col" />
    </div>

    <!-- Sending the Request -->

    <div>
      <div class="text-grey-6 q-py-md">
        می‌توانید از مدیر یا همکار سابقتان بخواهید برای شما توصیه‌نامه بنویسد.
        توصیه‌نامه‌هایی که دریافت کرده‌اید، در پروفایل جاب‌ویژنی شما به
        کارفرمایان نمایش داده می‌شود.
      </div>

      <div class="row items-center">
        <q-checkbox v-model="localSendRequest" />
        <div class="text-grey-7 q-pl-xs">ارسال درخواست توصیه نامه</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    formData: {
      type: Object,
      required: true,
    },
  },

  computed: {
    localContactNumber: {
      get() {
        return this.formData.contactNumber;
      },
      set(value) {
        this.updateData("contactNumber", value);
      },
    },
    localSendRequest: {
      get() {
        return this.formData.sendRequest;
      },
      set(value) {
        this.updateData("sendRequest", value);
      },
    },
  },
  
  methods: {
    updateData(field, value) {
      this.$emit("updateData", { field, value });
    },
  },
};
</script>
