<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center">
      <div class="col-8">
        <div class="q-pr-lg">
          <div class="col-12 row q-mt-lg q-mb-md">
            <div class="full-width bg-white br-10">
              <div class="col-12">
                <q-img
                  style="
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                  "
                  src="https://fileapi.jobvision.ir/StaticFiles/Employer/DefaultImages/default-companyHeader.jpeg?v=20231122"
                />
              </div>

              <div class="col-12">
                <div class="q-px-lg">
                  <div class="row">
                    <div
                      class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                    >
                      <q-item class="col-12 q-my-xs">
                        <q-item-section avatar>
                          <q-avatar size="95px">
                            <q-img
                              src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=154256&width=119&height=119"
                            />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section class="q-pa-md q-ml-xl">
                          <q-item-label class="text-bold text-h5"
                            >شرکت تولیدی و بازرگانی رکسان و دارا (سن
                            ایچ)</q-item-label
                          >

                          <div class="q-pt-md q-pb-sm">
                            <span class="q-pr-xs" style="font-size: 16px"
                              >5</span
                            >
                            <q-icon size="24px" color="orange-4" name="star" />
                          </div>

                          <div class="text-grey-7 q-pb-sm">51 تا 200 نفر</div>

                          <div class="text-grey-7">شرکت تولیدی و بازرگانی</div>
                        </q-item-section>

                        <q-item-section class="q-pa-sm row q-mr-lg" side>
                          <div class="absolute-bottom-right">
                            <q-btn
                              color="primary"
                              class="text-white q-mr-md"
                              label="دنبال کنید"
                              icon="add"
                            />

                            <q-btn
                              color="primary"
                              outline
                              label="امتیاز به شرکت"
                            />
                          </div>
                        </q-item-section>
                      </q-item>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 row">
            <div class="col-6">
              <div class="q-px-sm"></div>
            </div>
            <div class="col-6 row justify-end">
              <div class="q-px-sm"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
export default {};
</script>

<style scoped>
[dir="rtl"] .q-item__section--side {
  padding: 0;
}

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

.br-8 {
  border-radius: 8px;
}

.br-10 {
  border-radius: 10px !important;
}
</style>
