<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center q-mx-xl">
      <!-- POV -->

      <div
        class="col-8 row justify-between items-center q-px-md q-py-sm bg-white br-10"
      >
        <div class="col-4 row items-center q-px-md">
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

        <div class="col-4 row justify-end text-grey-8">
          <q-btn flat class="q-mx-sm" label="دانلود رزومه" icon="download" />

          <q-btn flat class="q-mx-sm" label="اشتراک گذاری رزومه" icon="share" />
        </div>
      </div>
    </div>

    <div class="row justify-center q-px-xl">
      <div class="col-8 row justify-between q-my-lg">
        <div class="col-6 row justify-center">
          <div
            class="bg-white full-width row justify-between br-10 q-px-md q-pt-lg"
          >
            <div class="col-12" style="margin-top: -25px">
              <q-badge
                class="text-white text-bold"
                style="background-color: #45c26f"
              >
                100%
              </q-badge>
            </div>

            <div class="text-h6 text-bold q-mt-md">درباره من</div>

            <q-btn flat class="text-grey-8 q-mt-md">
              <q-icon class="q-px-sm" name="edit" />

              ویرایش
            </q-btn>

            <div class="col-12 justify-between">
              <div class="q-mt-md q-mb-lg row justify-between">
                <div class="full-width q-pr-xl">
                  <q-item class="full-width">
                    <q-item-section top avatar>
                      <q-avatar
                        size="64px"
                        color="primary"
                        text-color="white"
                        icon="bluetooth"
                      />
                    </q-item-section>

                    <q-item-section>
                      <q-item-label>معین صداقتی</q-item-label>
                      <q-item-label caption lines="2">
                        دولوپر فول استک در شرکت آیترونیک
                        <q-icon
                          class="q-pl-sm"
                          color="primary"
                          name="edit"
                          size="18px"
                        />
                      </q-item-label>
                    </q-item-section>

                    <q-item-section side>
                      <q-btn
                        class="col-8"
                        flat
                        color="primary"
                        style="border: 2px dashed #5660f2"
                        label="افزودن"
                        icon="add"
                      />

                      <q-avatar class="q-mx-sm" size="25px">
                        <q-img
                          src="data:image/png;base64,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"
                        />
                      </q-avatar>
                    </q-item-section>
                  </q-item>
                </div>
              </div>
            </div>
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
