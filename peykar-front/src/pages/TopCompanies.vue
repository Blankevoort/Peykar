<template>
  <q-page style="background-color: #f8f9fa">
    <div class="full-width">
      <div class="bg-white br-10">
        <div class="q-py-lg">
          <div class="row justify-center">
            <div class="col-8 row justify-between">
              <div class="col-4 row">
                <div class="row">
                  <div class="col-1">
                    <q-separator vertical inset />
                  </div>

                  <div class="col-11">
                    <q-btn
                      rounded
                      dense
                      color="positive"
                      icon="done"
                      class="q-mr-sm"
                    />
                  </div>
                </div>
              </div>

              <div class="col-5 row justify-end"></div>
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
</style>
