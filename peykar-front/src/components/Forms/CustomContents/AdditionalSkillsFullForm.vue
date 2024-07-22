<template>
  <div :class="{ 'q-px-lg': !isXs }">
    <div class="q-gutter-y-sm">
      <div class="text-grey-7">مهارت</div>

      <div class="row q-gutter-x-sm">
        <q-input class="col-xs-8 col-" outlined v-model="skills" />

        <q-btn
          :class="{ 'q-px-lg': !isXs }"
          class="col-xs-3 col-"
          color="primary"
          label="افزودن"
          @click="addSkill"
        />
      </div>

      <div class="font-12 text-grey-6">مهارت‌ها در رزومه فارسی</div>
    </div>

    <div :class="['q-gutter-y-sm', isXs ? 'q-mt-md' : 'q-mt-xl']">
      <div
        class="row items-center"
        v-for="aSkills in additionSkills"
        :key="aSkills.name"
      >
        <div
          class="br-4 q-pa-xs text-white row items-center q-gutter-x-sm"
          style="background-color: #5c6573 !important"
        >
          <img
            style="width: 16px"
            src="https://jobvision.ir/assets/images/cv-maker/trash-white.svg"
          />

          <div class="row q-pr-sm">
            <div class="text-bold">{{ aSkills.name }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { useQuasar } from "quasar";

export default {
  name: "CustomContent",
  setup() {
    const $q = useQuasar();
    const skills = ref("");
    const additionSkills = ref([]);

    const isXs = computed(() => $q.screen.lt.sm);

    const addSkill = () => {
      if (skills.value.trim() !== "") {
        additionSkills.value.push({ name: skills.value.trim() });
        skills.value = "";
      }
    };

    return {
      isXs,
      skills,
      additionSkills,
      addSkill,
    };
  },
};
</script>
