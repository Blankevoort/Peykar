<template>
  <router-view />
</template>

<script setup>
import { ref, onMounted } from "vue";

const jobDetails = ref([]);
const user = ref({});

// Function to merge user data
const mergeUserData = (existingUser, newUser) => {
  for (const key in newUser) {
    if (typeof newUser[key] === "object" && !Array.isArray(newUser[key])) {
      existingUser[key] = mergeUserData(existingUser[key] || {}, newUser[key]);
    } else {
      existingUser[key] = newUser[key];
    }
  }
  return existingUser;
};

onMounted(() => {
  const savedJobDetails = JSON.parse(localStorage.getItem("jobDetails"));
  const savedUser = JSON.parse(localStorage.getItem("user"));
  const userLoggedOut = JSON.parse(localStorage.getItem("setUser"));

  // Remaining Time Calculation

  const today = new Date();
  const endDate = new Date(today);
  endDate.setDate(endDate.getDate() + 50);
  const difference = endDate.getTime() - today.getTime();
  const daysLeft = Math.floor(difference / (1000 * 60 * 60 * 24));
  const hoursLeft = Math.floor(
    (difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
  );
  const minutesLeft = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
  let remainingTimeMessage = "";
  if (daysLeft > 0) {
    remainingTimeMessage = `${daysLeft} روز باقی مانده`;
  } else if (hoursLeft > 0) {
    remainingTimeMessage = `${hoursLeft} ساعت باقی مانده`;
  } else if (minutesLeft > 0) {
    remainingTimeMessage = `${minutesLeft} دقیقه باقی مانده`;
  } else {
    remainingTimeMessage = "زمان به پایان رسیده است";
  }

  // Dummy Data

  if (savedJobDetails) {
    jobDetails.value = savedJobDetails;
  } else {
    jobDetails.value = [
      {
        id: 1,
        backgroundImage:
          "https://fileapi.jobvision.ir/StaticFiles/Employer/DefaultImages/default-companyHeader.jpeg?v=20231122",
        image:
          "https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=513699&width=80&height=80",
        title: "توسعه‌دهنده Front-End",
        workDates: "تمام وقت",
        company: "شرکت",
        description:
          "<div><p class='q-pt-md'>صرافی تبدیل، از شما برای همکاری در موقعیت شغلی Front-End Developer (Vue.js) دعوت به عمل می‌آورد.</p><br><br><div class='text-h6 text-bold'>مهارت‌های فنی</div><p class='q-pt-md'>HTML, CSS, JavaScript مسلط به<br>Vue, Nuxt مسلط به<br>TailwindCSS مسلط به<br>Vuetify آشنا با<br>SASS/SCSS مسلط به<br>Git آشنا با</p><br><div class='text-h6 text-bold'>مزایا و تسهیلات</div><p class='q-pt-md'>محیط کار استارتاپی، جوان و پویا با امکان رشد و ارتقا شغلی - ناهار - بیمه تکمیلی - امکان رشد و توسعه در شرکتی پیشرو در صنعت - بسته‌ها و هدایای مناسبتی</p></div>",
        tagList: [
          { label: "فوری", important: true },
          { label: "کارفرمای پاسخگو", important: false },
          { label: "درحال بررسی رزومه", important: false },
        ],
        benefits: [
          "محیط کار استارتاپی، جوان و پویا با امکان رشد و ارتقا شغلی",
          "ناهار",
          "بیمه تکمیلی",
          "امکان رشد و توسعه در شرکتی پیشرو در صنعت",
          "بسته‌ها و هدایای مناسبتی",
        ],
        workConditions:
          "شنبه تا چهارشنبه از ساعت 8:30 الی 17:30 (شروع تایم کاری از 8:30 تا 10 شناور)",
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
        rightsMin: "15",
        rightsMax: "20",
        location: "تهران، طرشت",
        postedDate: new Date().toISOString(),
        opportunityEndsIn: remainingTimeMessage,
        employmentConditions: {
          age: "25 سال",
          gender: "مرد",
          militaryService: "معاف",
          degree: [{ field: "HTML & CSS", proficiency: "کارشناسی" }],
          softwares: [
            { name: "HTML & CSS", proficiency: "پیشرفته" },
            { name: "JavaScript", proficiency: "پیشرفته" },
            { name: "Vue.js", proficiency: "پیشرفته" },
            { name: "Git", proficiency: "آشنا" },
          ],
        },
      },
    ];
    localStorage.setItem("jobDetails", JSON.stringify(jobDetails.value));
  }

  if (userLoggedOut === false) {
    localStorage.removeItem("user");
  } else {
    if (!savedUser) {
      user.value = {
        id: 1,
        name: "نام و نام خانوادگی",
        jobTitle: "دولوپر فول استک در شرکت آیترونیک",
        linkedIn: "",
        email: "email@example.com",
        phone: "09123456789",
        role: "job_seeker",
        updated: false,
        profile: {
          description: "توضیح کوتاه درباره کاربر",
          gender: "مرد",
          maritalStatus: "مجرد",
          militaryServiceStatus: "پایان خدمت",
          city: "شهر محل سکونت",
          address: "محل سکونت",
          birthDate: "1380/01/01",
          phoneNumber: "02112345678",
          expectedSalary: "8 - 6 میلیون تومان",
          interestedJobGroups: ["توسعه‌دهنده وب", "برنامه‌نویس"],
          foreigners: false,
          disability: false,
          nationality: "",
          disabilityType: "",
          education: {
            hasDiploma: true,
            diplomaField: "ریاضی فیزیک",
            higherEducation: [
              {
                degree: "لیسانس",
                field: "مهندسی نرم‌افزار",
                university: "دانشگاه تهران",
                gpa: 17.5,
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
              endMonth: "فروردین",
              endYear: 2015,
              currentlyWorking: true,
              achievements: "طراحی و توسعه وبسایت شرکت",
            },
          ],
          languages: [
            { language: "انگلیسی", proficiency: "پیشرفته" },
            { language: "فرانسه", proficiency: "متوسط" },
          ],
          softwareSkills: [
            { name: "برنامه‌نویسی جاوا", skill: "پیشرفته" },
            { name: "توسعه وب با Vue.js", skill: "متوسط" },
          ],
          additionalSkills: [{ name: "مدیریت پروژه" }, { name: "تحلیل داده" }],
          additionalInformation: {
            formerColleagues: [
              {
                fullName: "محمد محمدی",
                organizationName: "شرکت XYZ",
                jobTitle: "مدیر پروژه",
                organizationalRelationship: "همکار سابق",
                startYear: 2018,
                endYear: 2023,
                weStillWorkTogether: false,
                contactNumber: "09121234567",
              },
            ],
            educationCourses: [
              {
                educationalInstitute: "آموزشگاه ABC",
                organizer: "آموزشگاه ABC",
                courseName: "دوره برنامه‌نویسی وب",
                courseYear: 2020,
                courseDuration: "3 ماه",
                country: "ایران",
                hasCertificate: true,
              },
            ],
            awards: [{ title: "برترین برنامه‌نویس", year: 2019 }],
            academicExperiences: [
              { title: "پروژه توسعه نرم‌افزار مدیریت", year: 2021 },
            ],
            publications: [
              {
                title: "کتاب برنامه‌نویسی پیشرفته",
                date: "1400/03/01",
                publisher: ["نویسنده الف", "نویسنده ب"],
              },
            ],
            patents: [
              {
                title: "ثبت اختراع نرم‌افزار مدیریت پروژه",
                date: "1399/01/01",
                summary: "این اختراع درباره نرم‌افزار مدیریت پروژه است",
              },
            ],
            memberships: [
              {
                organizationName: "انجمن برنامه‌نویسان ایران",
                startYear: 2019,
              },
            ],
            projects: [
              {
                title: "پروژه توسعه وبسایت فروشگاهی",
                role: "توسعه‌دهنده اصلی",
                startYear: 2020,
                endYear: 2021,
                summary: "طراحی و توسعه وبسایت فروشگاهی با Vue.js",
              },
            ],
            volunteerActivities: [
              {
                title: "پروژه توسعه وبسایت فروشگاهی",
                year: 2020,
              },
            ],
          },
        },
      };
      localStorage.setItem("user", JSON.stringify(user.value));
    } else {
      if (!savedUser.updated) {
        user.value = mergeUserData(savedUser, user.value);
        localStorage.setItem("user", JSON.stringify(user.value));
      } else {
        user.value = savedUser;
      }
    }
  }

  localStorage.setItem("setUser", JSON.stringify(userLoggedOut));
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

.font-11 {
  font-size: 11px;
}

.font-12 {
  font-size: 12px;
}

.font-13 {
  font-size: 13px;
}

.font-16 {
  font-size: 16px;
}

.q-card__section--vert {
  padding: 0;
}
</style>
