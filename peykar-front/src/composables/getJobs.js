import { ref } from "vue";

export function getJobs() {
  const jobs = ref([]);

  try {
    const jobsData = localStorage.getItem("jobDetails");
    if (jobsData) {
      jobs.value = JSON.parse(jobsData);
    }
  } catch (error) {
    console.error("Error getting jobs from localStorage:", error);
  }

  return jobs;
}
