<template>
  <q-page>
    <q-btn label="toggle share" @click="share = true" />

    <q-btn label="toggle about me" @click="editAbout = true" />

    <q-btn label="toggle picture change" @click="editPicture = true" />

    <!-- Forms And Dialogs -->

    <q-dialog class="q-pa-sm" v-model="share">
      <div class="relative-position bg-white q-pa-md" style="width: 600px">
        <div class="absolute-right q-pt-xs">
          <q-btn flat color="grey-6" icon="cancel" @click="share = false" />
        </div>

        <div class="full-width q-my-md">
          <span class="text-grey-7">آدرس یکتا رزومه شما</span>

          <div class="row justify-between q-my-sm q-px-xs">
            <div class="col-9">
              <q-input class="input-box" outlined color="grey-5" v-model="link" />
            </div>

            <div class="col-3 q-pl-md">
              <q-btn
                style="height: 45px"
                outline
                color="primary"
                label="کپی لینک"
                @click="copyLink"
              />
            </div>
          </div>
        </div>
      </div>
    </q-dialog>

    <q-dialog class="q-pa-sm" v-model="editAbout">
      <div class="bg-white q-pa-md" style="width: 800px !important">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="editAbout = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="absolute-center text-h6 text-bold">ویرایش درباره من</div>
        </div>

        <div class="q-pa-md">
          <div class="q-pt-sm">
            <div class="row items-center">
              <div class="col-7 row">
                <q-avatar size="69px">
                  <q-img
                    src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
                  />
                </q-avatar>

                <div class="col-8 q-pl-md">
                  <div>تصویر پروفایل</div>

                  <div class="text-grey-6 q-py-sm">
                    ‌فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
                  </div>
                </div>
              </div>

              <div class="col-5">
                <q-btn
                  class="text-bold"
                  flat
                  color="primary"
                  label="بارگذاری تصویر پروفایل"
                  icon="upload"
                />
              </div>
            </div>
          </div>

          <div class="q-mt-md q-mb-sm">
            <div class="row justify-between items-center">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span class="q-pb-sm">عنوان شغلی نمایشی</span>

                  <q-btn flat>
                    <q-icon name="info" size="18px" />
                    <q-tooltip anchor="center left" self="center right">
                      Here I am!
                    </q-tooltip>
                  </q-btn>
                </div>

                <q-input outlined v-model="title" />
              </div>

              <div class="col-6 q-px-sm flex justify-end q-mt-sm">
                <div class="text-grey-7 q-pb-sm">Job Title</div>

                <q-input class="full-width" outlined v-model="en.title" />
              </div>
            </div>
          </div>

          <div class="q-my-md">
            <div class="full-width flex items-center">
              <div class="q-pb-sm text-grey-7">آدرس پروفایل لینکدین شما</div>

              <q-input outlined v-model="linkedin" class="full-width" />
            </div>
          </div>

          <div>
            <div class="row justify-between items-center">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 row justify-between">
                  <span class="q-pb-sm">چند جمله درباره خود بنویسید</span>

                  <span class="q-pb-sm">xxxx / 1000</span>
                </div>

                <q-input outlined type="textarea" v-model="description" />
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7 full-width row justify-between">
                  <span class="q-pb-sm">xxxx / 1000</span>

                  <span class="q-pb-sm">Describe Yourself</span>
                </div>

                <q-input
                  class="full-width"
                  outlined
                  type="textarea"
                  v-model="en.description"
                />
              </div>
            </div>
          </div>

          <div class="full-width relative-position q-mt-md q-pb-md">
            <div class="absolute-right">
              <q-btn flat color="grey-7" label="انصراف" />

              <q-btn color="primary" label="ذخیره تغییرات" />
            </div>
          </div>
        </div>
      </div>
    </q-dialog>

    <q-dialog class="q-pa-sm" v-model="editPicture">
      <div class="bg-white q-pa-md" style="width: 600px !important">
        <div class="full-width relative-position row" style="height: 45px">
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="editPicture = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="text-h6 text-bold">تصویر پروفایل</div>
        </div>

        <div class="text-center q-pa-md">
          <q-avatar size="180px">
            <q-img
              src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
            >
              <div
                class="absolute flex items-center justify-center"
                style="background-color: #acacac70; height: 100%"
              >
                <div>
                  <q-btn
                    flat
                    color="white"
                    label="بارگذاری تصویر"
                    icon="upload"
                  />
                </div>
              </div>
            </q-img>
          </q-avatar>

          <div class="q-mt-md text-grey-7">
            فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
          </div>
        </div>

        <div class="q-pb-md full-width">
          <q-separator />
        </div>

        <div class="full-width text-right">
          <q-btn color="primary" label="ذخیره تغییرات" />
        </div>
      </div>
    </q-dialog>
  </q-page>
</template>

<script>
import { useQuasar } from "quasar";
import { ref } from "vue";

export default {
  setup() {
    const $q = useQuasar();
    const link = ref("jobvision.ir/cv/83836552-092743");
    const title = ref("دولوپر فول استک در شرکت آیترونیک");
    const linkedin = ref("");

    const en = ref({
      title: "Full Stack Develeoper at Aytronic",
    });

    const share = ref(false);
    const editAbout = ref(false);
    const editPicture = ref(false);

    function copyLink() {
      navigator.clipboard.writeText(link.value);

      $q.notify({
        group: false,
        avatar: "https://jobvision.ir/assets/images/toasts/success.svg",
        position: "top-left",
        message: "لینک کپی شد",
        color: "dark",
        actions: [{ icon: "close", color: "white" }],
      });
    }

    return {
      en,
      link,
      title,
      share,
      linkedin,
      copyLink,
      editAbout,
      editPicture,
    };
  },
};
</script>

<style scoped>
:deep(.input-box .q-field__control),
:deep(.input-box .q-field__marginal) {
  height: 45px !important;
}

.q-dialog__inner--minimized > div {
  max-width: none !important;
}
</style>
