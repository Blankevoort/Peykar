<template>
  <router-view />
</template>

<script setup>
import { ref, onMounted } from "vue";

const jobDetails = ref({});

onMounted(() => {
  const savedJobDetails = JSON.parse(localStorage.getItem("jobDetails"));

  if (savedJobDetails) {
    jobDetails.value = savedJobDetails;
  } else {
    const jobDetail = {
      id: 1,
      image:
        "https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=513699&width=80&height=80",
      title: "توسعه‌دهنده Front-End",
      company: "شرکت الف",
      location: "تهران - خیابان شهدا",
      salary: "10,000,000 - 15,000,000 تومان",
      description: "ما به دنبال یک توسعه‌دهنده Front-End ماهر هستیم...",
      skills: [
        {
          name: "HTML",
          level: "پیشرفته",
        },
        {
          name: "CSS",
          level: "پیشرفته",
        },
        {
          name: "Javascript",
          level: "متوسط",
        },
      ],
      generalSkills: [
        "روحیه کار تیمی",
        "مسئولیت پذیر و متعهد",
        "رفتار مناسب با دیگران",
      ],
      benefits: ["بیمه تکمیلی", "ساعت کاری انعطاف‌پذیر"],
    };
    localStorage.setItem("jobDetails", JSON.stringify(jobDetail));
    jobDetails.value = jobDetail;
  }
});
</script>

<style>
.br-4 {
  border-radius: 4px;
}
.br-8 {
  border-radius: 8px;
}

.br-10 {
  border-radius: 10px !important;
}

.q-btn.no-hover:hover {
  animation: none !important;
}
</style>
