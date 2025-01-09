import { useQuasar } from "quasar";
import { useErrorHandler } from "./useErrorHandler";
import { api } from "src/boot/axios";

export default function useJobActions() {
  const $q = useQuasar();
  const { handleError } = useErrorHandler();

  const like = (jobId) => {
    api
      .post("api/like", {
        job_id: jobId,
      })
      .then((r) => {
        if (r.data.status === 204) {
          $q.notify({
            message: r.data.message || "موقعیت در لیست علاقهمندی‌ها قرار گرفت!",
            color: "green",
            position: "bottom-left",
          });
        }
      })
      .catch(handleError);
  };

  const sendCV = (jobId) => {
    api
      .post("api/job/" + jobId + "/request")
      .then((r) => {
        if (r.data.status === 204) {
          $q.notify({
            message: "درخواست با موفقیت ارسال شد!",
            color: "green",
            position: "bottom-left",
          });
        } else if (r.data.status === 409) {
          $q.notify({
            message: "برای این موقعیت درخواست ارسال شده دارید",
            color: "red",
            position: "bottom-left",
          });
        }
      })
      .catch(handleError);
  };

  return { like, sendCV };
}
