const routes = [
  {
    path: "/",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/IndexPage.vue") }],
  },
  {
    path: "/jobs",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/LayoutPages/Jobs/JobsListPage.vue") }],
  },
  {
    path: "/recommended-jobs",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("src/pages/LayoutPages/Jobs/RecommendedPage.vue") },
    ],
  },
  {
    path: "/my-cv",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/AccountManagment/Dashboards/myResume.vue") }],
  },
  {
    path: "/top-companies",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/LayoutPages/Companies/TopCompanies.vue") }],
  },
  {
    path: "/company",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/LayoutPages/Companies/CompanyPage.vue") }],
  },
  {
    path: "/job",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/LayoutPages/Jobs/JobInfoPage.vue") }],
  },
  {
    path: "/account",
    component: () => import("src/layouts/BlankLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/AccountManagment/UserLogin/UserLoginPage.vue") }],
  },
  {
    path: "/employer",
    component: () => import("src/layouts/BlankLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/AccountManagment/UserLogin/EmployerLoginPage.vue") }],
  },
  {
    path: "/test",
    component: () => import("src/layouts/BlankLayout.vue"),
    children: [{ path: "", component: () => import("pages/TestPage.vue") }],
  },

  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
