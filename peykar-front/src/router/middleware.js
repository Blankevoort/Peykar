import { Cookies } from "quasar";
import { api } from "src/boot/axios";

export function getUser() {
  return new Promise((resolve, reject) => {
    api
      .get("api/user")
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
  });
}

export function checkAccess(to, from, next) {
  const userToken = Cookies.get("token");

  if (to.meta.requireAuth) {
    if (userToken) {
      getUser()
        .then(() => {
          next();
        })
        .catch(() => {
          next("/access-denied");
        });
    } else {
      next({
        path: "/login",
        query: {
          redirect: to.fullPath,
        },
      });
    }
  } else if (to.meta.login) {
    if (userToken) {
      next({
        path: "/",
        query: {
          redirect: to.fullPath,
        },
      });
    } else {
      next();
    }
  } else {
    next();
  }
}
