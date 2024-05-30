import { ref } from 'vue';

export function getUser() {
  const user = ref(null);

  try {
    const userData = localStorage.getItem('user');
    if (userData) {
      user.value = JSON.parse(userData);
    }
  } catch (error) {
    console.error('Error getting user from localStorage:', error);
  }

  return user;
}
