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
    const user = {
      id: 1,
      name: "نام و نام خانوادگی",
      email: "email@example.com",
      phone: "09123456789",
      role: "job_seeker",
      profile: {
        description: "توضیح کوتاه درباره کاربر",
        gender: "مرد",
        maritalStatus: "مجرد",
        militaryServiceStatus: "پایان خدمت",
        city: "شهر محل سکونت",
        address: "محل سکونت",
        birthDate: "1990-01-01",
        phoneNumber: "02112345678",
        requestedSalary: "8 - 6 میلیون تومان",
        interestedJobGroups: ["توسعه‌دهنده وب", "برنامه‌نویس"],
        foreigners: false,
        disability: false,
        education: {
          hasDiploma: true,
          diplomaField: "ریاضی فیزیک",
          higherEducation: [
            {
              degree: "لیسانس",
              field: "مهندسی نرم‌افزار",
              university: "دانشگاه تهران",
              grade: 17.5,
              startYear: 2010,
              endYear: 2014,
              isStudying: false,
            },
          ],
        },
        workExperience: [
          {
            jobTitle: "توسعه‌دهنده وب",
            field: "IT",
            organizationalLevel: "متوسط",
            companyName: "شرکت ABC",
            companyField: "تکنولوژی اطلاعات",
            country: "ایران",
            city: "تهران",
            startMonth: "فروردین",
            startYear: 2015,
            isCurrentlyWorking: true,
            achievements: "طراحی و توسعه وبسایت شرکت",
          },
        ],
        languages: [
          { language: "انگلیسی", proficiency: "پیشرفته" },
          { language: "فرانسه", proficiency: "متوسط" },
        ],
        additionalSkills: [
          { id: 1, name: "برنامه‌نویسی جاوا" },
          { id: 2, name: "توسعه وب با Vue.js" },
        ],
        references: [
          {
            fullName: "محمد محمدی",
            companyName: "شرکت XYZ",
            jobTitle: "مدیر پروژه",
            relationship: "همکار سابق",
            startYear: 2018,
            isCurrentlyWorking: true,
            contactNumber: "09121234567",
          },
        ],
        courses: [
          {
            institution: "آموزشگاه ABC",
            organizer: "آموزشگاه ABC",
            courseName: "دوره برنامه‌نویسی وب",
            courseYear: 2020,
            courseDuration: "3 ماه",
            country: "ایران",
            hasCertificate: true,
          },
        ],
        awards: [{ title: "برترین برنامه‌نویس", year: 2019 }],
        projects: [{ title: "پروژه توسعه نرم‌افزار مدیریت", year: 2021 }],
        publications: [
          {
            title: "کتاب برنامه‌نویسی پیشرفته",
            publisher: "ناشر XYZ",
            year: 2022,
          },
        ],
        volunteerActivities: [
          { title: "فعالیت‌های داوطلبانه در جمعیت هلال احمر", year: 2020 },
        ],
      },
    };

    const jobDetails = {
      id: 1,
      backgroundImage:
        "https://fileapi.jobvision.ir/StaticFiles/Employer/DefaultImages/default-companyHeader.jpeg?v=20231122",
      image:
        "https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=513699&width=80&height=80",
      title: "توسعه‌دهنده Front-End",
      description:
        "صرافی تبدیل، از شما برای همکاری در موقعیت شغلی Front-End Developer (Vue.js) دعوت به عمل می‌آورد.",
      technicalSkills: [
        "HTML, CSS, JavaScript مسلط به",
        "Vue, Nuxt مسلط به",
        "TailwindCSS مسلط به",
        "Vuetify آشنا با",
        "SASS/SCSS مسلط به",
        "Git آشنا با",
        "UI/UX آشنا با مفاهیم",
        "SEO, Optimization آشنا با مفاهیم",
        "RESTful آشنا با مفاهیم",
        "Responsive Design آشنا با مفاهیم",
        "Clean Code آشنا با مفاهیم",
      ],
      generalSkills: [
        "روحیه کار تیمی",
        "مسئولیت پذیر و متعهد",
        "رفتار مناسب با دیگران",
      ],
      benefits: [
        "محیط کار استارتاپی، جوان و پویا با امکان رشد و ارتقا شغلی",
        "ناهار",
        "بیمه تکمیلی",
        "امکان رشد و توسعه در شرکتی پیشرو در صنعت",
        "بسته‌ها و هدایای مناسبتی",
      ],
      workConditions: [
        "شنبه تا چهارشنبه از ساعت 8:30 الی 17:30 (شروع تایم کاری از 8:30 تا 10 شناور)",
        "پنج شنبه ها یک هفته در میان از ساعت 9 الی 14 (شروع تایم کاری از 9 تا 10 شناور)",
      ],
      keyIndicators: {
        similarExperience: ["2 سال سابقه کار در گروه شغلی مشابه"],
        neededSkills: [
          { name: "Html & CSS", level: "متوسط" },
          { name: "JavaScript", level: "متوسط" },
          { name: "VueJS", level: "پیشرفته" },
          { name: "Rest API", level: "متوسط" },
          { name: "GIT", level: "متوسط" },
        ],
      },
      postedDate: new Date().toISOString(),
    };

    localStorage.setItem("jobDetails", JSON.stringify(jobDetails));
    localStorage.setItem("user", JSON.stringify(user));
    jobDetails.value = jobDetails;
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
