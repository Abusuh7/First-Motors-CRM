const showSigninPromptButton1 = document.getElementById('showSigninPromptButton');
const signinPromptContainer = document.getElementById('promptUserContainer');

showSigninPromptButton1.addEventListener('click', () => {
    signinPromptContainer.classList.remove('hidden');
});
