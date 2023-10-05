<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics Dashboard') }}
        </h2>
    </x-slot>


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-6 pt-6 2xl:container">
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div class="md:col-span-2 lg:col-span-1" >
                        <div class="h-full py-8 px-6 space-y-6 rounded-xl border border-gray-200 bg-white">
                            <svg class="w-40 m-auto opacity-75" viewBox="0 0 146 146" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M73.1866 5.7129C81.999 5.7129 90.725 7.44863 98.8666 10.821C107.008 14.1933 114.406 19.1363 120.637 25.3675C126.868 31.5988 131.811 38.9964 135.184 47.138C138.556 55.2796 140.292 64.0057 140.292 72.818C140.292 81.6304 138.556 90.3565 135.184 98.4981C131.811 106.64 126.868 114.037 120.637 120.269C114.406 126.5 107.008 131.443 98.8666 134.815C90.725 138.187 81.999 139.923 73.1866 139.923C64.3742 139.923 55.6481 138.187 47.5066 134.815C39.365 131.443 31.9674 126.5 25.7361 120.269C19.5048 114.037 14.5619 106.64 11.1895 98.4981C7.81717 90.3565 6.08144 81.6304 6.08144 72.818C6.08144 64.0057 7.81717 55.2796 11.1895 47.138C14.5619 38.9964 19.5048 31.5988 25.7361 25.3675C31.9674 19.1363 39.365 14.1933 47.5066 10.821C55.6481 7.44863 64.3742 5.7129 73.1866 5.7129L73.1866 5.7129Z" stroke="#e4e4f2" stroke-width="4.89873"/>
                                <path d="M73.5 23.4494C79.9414 23.4494 86.3198 24.7181 92.2709 27.1831C98.222 29.6482 103.629 33.2612 108.184 37.816C112.739 42.3707 116.352 47.778 118.817 53.7291C121.282 59.6802 122.551 66.0586 122.551 72.5C122.551 78.9414 121.282 85.3198 118.817 91.2709C116.352 97.222 112.739 102.629 108.184 107.184C103.629 111.739 98.222 115.352 92.2709 117.817C86.3198 120.282 79.9414 121.551 73.5 121.551C67.0586 121.551 60.6802 120.282 54.7291 117.817C48.778 115.352 43.3707 111.739 38.816 107.184C34.2612 102.629 30.6481 97.222 28.1831 91.2709C25.7181 85.3198 24.4494 78.9414 24.4494 72.5C24.4494 66.0586 25.7181 59.6802 28.1831 53.7291C30.6481 47.778 34.2612 42.3707 38.816 37.816C43.3707 33.2612 48.778 29.6481 54.7291 27.1831C60.6802 24.7181 67.0586 23.4494 73.5 23.4494L73.5 23.4494Z" stroke="#e4e4f2" stroke-width="4.89873"/>
                                <path d="M73 24C84.3364 24 95.3221 27.9307 104.085 35.1225C112.848 42.3142 118.847 52.322 121.058 63.4406C123.27 74.5592 121.558 86.1006 116.214 96.0984C110.87 106.096 102.225 113.932 91.7515 118.27C81.278 122.608 69.6243 123.181 58.7761 119.89C47.9278 116.599 38.5562 109.649 32.258 100.223C25.9598 90.7971 23.1248 79.479 24.2359 68.1972C25.3471 56.9153 30.3357 46.3678 38.3518 38.3518" stroke="url(#paint0_linear_622:13617)" stroke-width="10" stroke-linecap="round"/>
                                <path d="M73 5.00001C84.365 5.00001 95.5488 7.84852 105.529 13.2852C115.509 18.7218 123.968 26.5732 130.131 36.1217C136.295 45.6702 139.967 56.6112 140.812 67.9448C141.657 79.2783 139.648 90.6429 134.968 101C130.288 111.357 123.087 120.375 114.023 127.232C104.96 134.088 94.3218 138.563 83.0824 140.248C71.8431 141.933 60.3606 140.775 49.6845 136.878C39.0085 132.981 29.4793 126.471 21.9681 117.942" stroke="url(#paint1_linear_622:13617)" stroke-width="10" stroke-linecap="round"/>
                                <path d="M9.60279 97.5926C6.37325 89.2671 4.81515 80.3871 5.01745 71.4595C5.21975 62.5319 7.1785 53.7316 10.7818 45.561C14.3852 37.3904 19.5626 30.0095 26.0184 23.8398C32.4742 17.6701 40.082 12.8323 48.4075 9.6028" stroke="url(#paint2_linear_622:13617)" stroke-width="10" stroke-linecap="round"/>
                                <path d="M73 5.00001C86.6504 5.00001 99.9849 9.10831 111.269 16.7904" stroke="url(#paint3_linear_622:13617)" stroke-width="10" stroke-linecap="round"/>
                                <circle cx="73.5" cy="72.5" r="29" fill="#e4e4f2" stroke="#e4e4f2"/>
                                <path d="M74 82.8332C68.0167 82.8332 63.1666 77.9831 63.1666 71.9998C63.1666 66.0166 68.0167 61.1665 74 61.1665C79.9832 61.1665 84.8333 66.0166 84.8333 71.9998C84.8333 77.9831 79.9832 82.8332 74 82.8332ZM74 80.6665C76.2985 80.6665 78.5029 79.7534 80.1282 78.1281C81.7535 76.5028 82.6666 74.2984 82.6666 71.9998C82.6666 69.7013 81.7535 67.4969 80.1282 65.8716C78.5029 64.2463 76.2985 63.3332 74 63.3332C71.7014 63.3332 69.497 64.2463 67.8717 65.8716C66.2464 67.4969 65.3333 69.7013 65.3333 71.9998C65.3333 74.2984 66.2464 76.5028 67.8717 78.1281C69.497 79.7534 71.7014 80.6665 74 80.6665ZM70.75 67.6665H77.25L79.9583 71.4582L74 77.4165L68.0416 71.4582L70.75 67.6665ZM71.8658 69.8332L70.8691 71.2307L74 74.3615L77.1308 71.2307L76.1341 69.8332H71.8658Z" fill="#6A6A9F"/>
                                <defs>
                                <linearGradient id="paint0_linear_622:13617" x1="45.9997" y1="19" x2="46.0897" y2="124.308" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#E323FF"/>
                                <stop offset="1" stop-color="#7517F8"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_622:13617" x1="1.74103e-06" y1="8.70228e-06" x2="6.34739e-08" y2="140.677" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#4DFFDF"/>
                                <stop offset="1" stop-color="#4DA1FF"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear_622:13617" x1="36.4997" y1="5.07257e-06" x2="36.6213" y2="142.36" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FFD422"/>
                                <stop offset="1" stop-color="#FF7D05"/>
                                </linearGradient>
                                <linearGradient id="paint3_linear_622:13617" x1="1.74103e-06" y1="8.70228e-06" x2="6.34739e-08" y2="140.677" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#4DFFDF"/>
                                <stop offset="1" stop-color="#4DA1FF"/>
                                </linearGradient>
                                </defs>
                            </svg>
                            <div>
                                <h5 class="text-xl text-gray-600 text-center">Revenue</h5>
                                <div class="mt-2 flex justify-center gap-4">
                                    <h3 class="text-3xl font-bold text-gray-700">$23,988</h3>
                                    <div class="flex items-end gap-1 text-green-500">
                                        <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor"/>
                                        </svg>
                                        <span>2%</span>
                                    </div>
                                </div>
                                <span class="block text-center text-gray-500">Compared to last week $13,988</span>
                            </div>
                            <table class="w-full text-gray-600">
                                <tbody>
                                    <tr>
                                        <td class="py-2">Tailored ui</td>
                                        <td class="text-gray-500">896</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5" stroke="url(#paint0_linear_622:13631)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13631" x1="68" y1="7.74997" x2="1.69701" y2="8.10029" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E323FF"/>
                                                <stop offset="1" stop-color="#7517F8"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Customize</td>
                                        <td class="text-gray-500">1200</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 12.929C8.69077 12.929 7.66833 9.47584 17.8928 9.47584C28.1172 9.47584 25.5611 15.9524 34.2519 15.9524C42.9426 15.9524 44.8455 10.929 51.6334 10.929C58.2217 10.929 59.3092 5 68 5" stroke="url(#paint0_linear_622:13640)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13640" x1="34" y1="5" x2="34" y2="15.9524" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#8AFF6C"/>
                                                <stop offset="1" stop-color="#02C751"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Other</td>
                                        <td class="text-gray-500">12</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 6C8.62687 6 6.85075 12.75 17 12.75C27.1493 12.75 25.3731 9 34 9C42.6269 9 42.262 13.875 49 13.875C55.5398 13.875 58.3731 6 67 6" stroke="url(#paint0_linear_622:13649)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13649" x1="67" y1="7.96873" x2="1.67368" y2="8.44377" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD422"/>
                                                <stop offset="1" stop-color="#FF7D05"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <div class="h-full py-6 px-6 rounded-xl border border-gray-200 bg-white">
                            <h5 class="text-xl text-gray-700">Downloads</h5>
                            <div class="my-8">
                                <h1 class="text-5xl font-bold text-gray-800">64,5%</h1>
                                <span class="text-gray-500">Compared to last week $13,988</span>
                            </div>
                            <svg class="w-full" viewBox="0 0 218 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 67.5C27.8998 67.5 24.6002 15 52.5 15C80.3998 15 77.1002 29 105 29C132.9 29 128.6 52 156.5 52C184.4 52 189.127 63.8158 217.027 63.8158" stroke="url(#paint0_linear_622:13664)" stroke-width="3" stroke-linecap="round"/>
                                <path d="M0 67.5C27.2601 67.5 30.7399 31 58 31C85.2601 31 80.7399 2 108 2C135.26 2 134.74 43 162 43C189.26 43 190.74 63.665 218 63.665" stroke="url(#paint1_linear_622:13664)" stroke-width="3" stroke-linecap="round"/>
                                <defs>
                                <linearGradient id="paint0_linear_622:13664" x1="217.027" y1="15" x2="7.91244" y2="15" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#4DFFDF"/>
                                <stop offset="1" stop-color="#4DA1FF"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear_622:13664" x1="218" y1="18.3748" x2="5.4362" y2="18.9795" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#E323FF"/>
                                <stop offset="1" stop-color="#7517F8"/>
                                </linearGradient>
                                </defs>
                            </svg>
                            <table class="mt-6 -mb-2 w-full text-gray-600">
                                <tbody>
                                    <tr>
                                        <td class="py-2">From new users</td>
                                        <td class="text-gray-500">896</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5" stroke="url(#paint0_linear_622:13631)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13631" x1="68" y1="7.74997" x2="1.69701" y2="8.10029" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E323FF"/>
                                                <stop offset="1" stop-color="#7517F8"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">From old users</td>
                                        <td class="text-gray-500">1200</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 12.929C8.69077 12.929 7.66833 9.47584 17.8928 9.47584C28.1172 9.47584 25.5611 15.9524 34.2519 15.9524C42.9426 15.9524 44.8455 10.929 51.6334 10.929C58.2217 10.929 59.3092 5 68 5" stroke="url(#paint0_linear_622:13640)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13640" x1="34" y1="5" x2="34" y2="15.9524" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#8AFF6C"/>
                                                <stop offset="1" stop-color="#02C751"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                        <div class="lg:h-full py-8 px-6 text-gray-600 rounded-xl border border-gray-200 bg-white">
                            <div class="mt-6">
                                <b><h2 class=" text-2xl text-gray-700 text-center">Users</h2></b>
                                <div class="mt-2 flex justify-center gap-4">
                                    <h3 class="text-3xl font-bold text-gray-700">{{ $usersCount }}</h3>
                                    <div class="flex items-end gap-1 text-green-500">
                                        <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor"/>
                                        </svg>
                                        <span>2%</span>
                                    </div>
                                </div>
                                <span class="block text-center text-gray-500">Compared to last week 13</span>
                            </div>
                            <table class="mt-6 -mb-2 w-full text-gray-600">
                                <tbody>
                                    <tr>
                                        <td class="py-2">Tailored ui</td>
                                        <td class="text-gray-500">896</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5" stroke="url(#paint0_linear_622:13631)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13631" x1="68" y1="7.74997" x2="1.69701" y2="8.10029" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#E323FF"/>
                                                <stop offset="1" stop-color="#7517F8"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Customize</td>
                                        <td class="text-gray-500">1200</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 12.929C8.69077 12.929 7.66833 9.47584 17.8928 9.47584C28.1172 9.47584 25.5611 15.9524 34.2519 15.9524C42.9426 15.9524 44.8455 10.929 51.6334 10.929C58.2217 10.929 59.3092 5 68 5" stroke="url(#paint0_linear_622:13640)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13640" x1="34" y1="5" x2="34" y2="15.9524" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#8AFF6C"/>
                                                <stop offset="1" stop-color="#02C751"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Other</td>
                                        <td class="text-gray-500">12</td>
                                        <td>
                                            <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2"/>
                                                <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2"/>
                                                <path d="M0 6C8.62687 6 6.85075 12.75 17 12.75C27.1493 12.75 25.3731 9 34 9C42.6269 9 42.262 13.875 49 13.875C55.5398 13.875 58.3731 6 67 6" stroke="url(#paint0_linear_622:13649)" stroke-width="2" stroke-linejoin="round"/>
                                                <defs>
                                                <linearGradient id="paint0_linear_622:13649" x1="67" y1="7.96873" x2="1.67368" y2="8.44377" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FFD422"/>
                                                <stop offset="1" stop-color="#FF7D05"/>
                                                </linearGradient>
                                                </defs>
                                            </svg>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



    <div class="container mx-auto p-4">

        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-4 py-5">
            <!-- New Test Drive Notifications -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-bell text-4xl text-yellow-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">New Test Drive Notifications</h2>
                    @if ($testDriveCount == 0)
                        <b>
                            <p class="text-blue-800">No New Notifications</p>
                        </b>
                    @else
                        <p>Notification:
                            <span
                                class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $testDriveCount }}</span>
                        </p>
                    @endif


                    <!-- Add more notification metrics here -->
                </div>
            </div>

            <!-- New Purchase Notifications -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-bell text-4xl text-pink-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">New Purchase Notifications</h2>
                    @if ($purchaseCount == 0)
                        <b>
                            <p class="text-blue-800">No New Notifications</p>
                        </b>
                    @else
                        <p>Notification:
                            <span
                                class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $purchaseCount }}</span>
                        </p>
                    @endif

                    <!-- Add more notification metrics here -->
                </div>
            </div>

            <!-- New Users -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-user-plus text-4xl text-orange-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">New Users</h2>
                    <p>New Users:
                        <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $newUsersCount }}</span>
                    </p>

                    <!-- Add more user metrics here -->
                </div>
            </div>

        </div>


        {{-- CHART --}}
        <div class="bg-gray-200 p-5 rounded-lg shadow-md my-5" x-data="{ selectedOption: 'Last 7 Days' }">
            <div class="flex justify-center space-x-4">
                <div class="relative">
                    <select x-model="selectedOption"
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline-blue focus:border-blue-300">
                        <option>Last 7 Days</option>
                        <option>Last Month</option>
                        <option>Last Year</option>
                    </select>
                </div>
            </div>

            {{-- Display chart based on selected option --}}
            <div x-show="selectedOption === 'Last 7 Days'"
                class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
                <div>
                    <canvas id="mylineChart"></canvas>
                </div>

                <div>
                    <canvas id="mybarChart"></canvas>
                </div>
            </div>

            <div x-show="selectedOption === 'Last Month'"
                class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
                <div>
                    <canvas id="mylineChart1"></canvas>
                </div>

                <div>
                    <canvas id="mybarChart1"></canvas>
                </div>
            </div>

            <div x-show="selectedOption === 'Last Year'"
                class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
                <div>
                    <canvas id="mylineChart2"></canvas>
                </div>

                <div>
                    <canvas id="mybarChart2"></canvas>
                </div>
            </div>


            <div x-show="selectedOption === 'Last 7 Days'" class="flex justify-center mt-6">
                <div class="bg-white w-1/3 rounded-lg shadow-md p-4 flex items-center">
                    <div class="mr-4">
                        <i class="fas fa-chart-line text-4xl text-blue-500"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold mb-2">Profits</h2>
                        <p class="text-lg"><b>Rs {{ number_format($profitLastSevenDays) }}</b></p>
                        <!-- Add more sales metrics here -->
                    </div>
                </div>
            </div>

            <div x-show="selectedOption === 'Last Month'" class="flex justify-center mt-6">
                <div class="bg-white w-1/3 rounded-lg shadow-md p-4 flex items-center">
                    <div class="mr-4">
                        <i class="fas fa-chart-line text-4xl text-blue-500"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold mb-2">Profits</h2>
                        <p class="text-lg"><b>Rs {{ number_format($profitLastThirtyDays) }}</b></p>
                        <!-- Add more sales metrics here -->
                    </div>
                </div>
            </div>

            <div x-show="selectedOption === 'Last Year'" class="flex justify-center mt-6">
                <div class="bg-white w-1/3 rounded-lg shadow-md p-4 flex items-center">
                    <div class="mr-4">
                        <i class="fas fa-chart-line text-4xl text-blue-500"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold mb-2">Profits</h2>
                        <p class="text-lg"><b>Rs {{ number_format($profitLastYear) }}</b></p>
                        <!-- Add more sales metrics here -->
                    </div>
                </div>
            </div>


        </div>


        {{-- CHART --}}


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Sales Performance -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-chart-line text-4xl text-blue-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Total Revenue</h2>
                    <p class=" text-lg"><b>Rs {{ number_format($totalRevenue) }}</b></p>
                    <!-- Add more sales metrics here -->
                </div>
            </div>

            <!-- Total Users -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-users text-4xl text-green-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Total Users</h2>
                    <p>Users:
                        <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $usersCount }}</span>
                    </p>

                    <!-- Add more user metrics here -->
                </div>
            </div>



            <!-- Purchase Bookings -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-shopping-cart text-4xl text-red-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Purchase Bookings</h2>
                    <p>Bookings: <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $purchaseTotalCount }}</span>
                    </p>
                    <!-- Add more booking metrics here -->
                </div>
            </div>

            <!-- Test-Drive Bookings -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-car text-4xl text-purple-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Test-Drive Bookings</h2>
                    <p>Bookings: <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $testDriveTotalCount }}</span>
                    </p>
                    <!-- Add more booking metrics here -->
                </div>
            </div>



            <!-- Total Admins -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-user-shield text-4xl text-indigo-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Total Admins</h2>
                    <p>Admin:
                        <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $adminCount }}</span>
                    </p>

                    <!-- Add more admin metrics here -->
                </div>
            </div>

            <!-- Total Customers -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-user-friends text-4xl text-teal-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Total Customers</h2>
                    <p>Customers:
                        <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $customerCount }}</span>
                    </p>

                    <!-- Add more customer metrics here -->
                </div>
            </div>

            <!-- Total Staffs -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-user-tie text-4xl text-gray-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Total Staffs</h2>
                    <p>Staffs:
                        <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $staffCount }}</span>
                    </p>

                    <!-- Add more staff metrics here -->
                </div>
            </div>

            <!-- Total Vehicles Sold -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-car-side text-4xl text-brown-500"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Total Vehicles Sold</h2>
                    <p>Sold: <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $soldVehiclesCount }}</span>
                    </p>
                    <!-- Add more vehicle metrics here -->
                </div>
            </div>

            <!-- Total Vehicles In-Stock -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <div class="mr-4">
                    <i class="fas fa-car text-4xl text-gray-800"></i>
                </div>
                <div>
                    <h2 class="text-lg font-semibold mb-2">Total Vehicles In-Stock</h2>
                    <p>In-Stock: <span
                            class="inline-flex items-center justify-center w-8 h-7 ml-2 text-l font-semibold text-blue-800 bg-blue-200 rounded-full">{{ $vehiclesCount }}</span>
                    </p>
                    <!-- Add more vehicle metrics here -->
                </div>
            </div>
            <!-- Add more sections for other analytics here -->
        </div>
    </div>

    <script>
        //-------------------line chart--------------------------
        const linectx = document.getElementById("mylineChart").getContext("2d");
        const linectx2 = document.getElementById("mylineChart1").getContext("2d");
        const linectx3 = document.getElementById("mylineChart2").getContext("2d");


        const value = @json($totalRevenueLastSevenDays);
        const dates = @json($lastSevenDays);
        dates.reverse();
        value.reverse();

        const value1 = @json($totalRevenueLastThirtyDays);
        const dates1 = @json($lastThirtyDates);
        dates1.reverse();
        value1.reverse();


        const value2 = @json($totalRevenueLastYearMonths);
        const dates2 = @json($lastYearMonths);
        dates2.reverse();
        value2.reverse();


        //7 days back
        new Chart(linectx, {
            type: "line",
            data: {
                labels: dates,
                datasets: [{
                    label: "Revenue Points",
                    data: value,
                    borderWidth: 2,
                    fill: true,
                    backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                    borderColor: ["rgba(75, 192, 192, 1)"],
                    pointBackgroundColor: "rgba(75, 192, 192, 1)",
                    pointRaduis: 3,

                }, ],
            },
            options: {
                Responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false,
                        },
                    },
                },
                elements: {
                    line: {
                        tension: 0.4,
                    },
                },
                Legend: {
                    display: true,
                    position: "top",
                },
            },
        });

        //30 days back
        new Chart(linectx2, {
            type: "line",
            data: {
                labels: dates1,
                datasets: [{
                    label: "Revenue Points",
                    data: value1,
                    borderWidth: 2,
                    fill: true,
                    backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                    borderColor: ["rgba(75, 192, 192, 1)"],
                    pointBackgroundColor: "rgba(75, 192, 192, 1)",
                    pointRaduis: 3,

                }, ],
            },
            options: {
                Responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false,
                        },
                    },
                },
                elements: {
                    line: {
                        tension: 0.4,
                    },
                },
                Legend: {
                    display: true,
                    position: "top",
                },
            },
        });

        //1 year back
        new Chart(linectx3, {
            type: "line",
            data: {
                labels: dates2,
                datasets: [{
                    label: "Revenue Points",
                    data: value2,
                    borderWidth: 2,
                    fill: true,
                    backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                    borderColor: ["rgba(75, 192, 192, 1)"],
                    pointBackgroundColor: "rgba(75, 192, 192, 1)",
                    pointRaduis: 3,

                }, ],
            },
            options: {
                Responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false,
                        },
                    },
                },
                elements: {
                    line: {
                        tension: 0.4,
                    },
                },
                Legend: {
                    display: true,
                    position: "top",
                },
            },
        });

        //------------------Bar chart-------------------------

        const barctx = document.getElementById("mybarChart");
        const barctx2 = document.getElementById("mybarChart1");
        const barctx3 = document.getElementById("mybarChart2");

        const userAreaPoints = @json($cityCount);
        const userAreaPoints1 = @json($cityCount1);
        const userAreaPoints2 = @json($cityCount2);


        //7 days back
        new Chart(barctx, {
            type: "bar",
            data: {
                labels: ["Colombo", "Kalutara", "Galle", "Anuradhapura", "Kandy", "Other"],
                datasets: [{
                    label: "User Area Points",
                    data: userAreaPoints,
                    borderWidth: 2,
                    fill: true,
                    backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                    borderColor: ["rgba(75, 192, 192, 1)"],
                    pointBackgroundColor: "rgba(75, 192, 192, 1)",
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1, // Set the step size to 1

                    },
                },
            },
        });

        //30 days back
        new Chart(barctx2, {
            type: "bar",
            data: {
                labels: ["Colombo", "Kalutara", "Galle", "Anuradhapura", "Kandy", "Other"],
                datasets: [{
                    label: "User Area Points",
                    data: userAreaPoints1,
                    borderWidth: 2,
                    fill: true,
                    backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                    borderColor: ["rgba(75, 192, 192, 1)"],
                    pointBackgroundColor: "rgba(75, 192, 192, 1)",
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1, // Set the step size to 1

                    },
                },
            },
        });

        //1 year back
        new Chart(barctx3, {
            type: "bar",
            data: {
                labels: ["Colombo", "Kalutara", "Galle", "Anuradhapura", "Kandy", "Other"],
                datasets: [{
                    label: "User Area Points",
                    data: userAreaPoints2,
                    borderWidth: 2,
                    fill: true,
                    backgroundColor: ["rgba(75, 192, 192, 0.3)"],
                    borderColor: ["rgba(75, 192, 192, 1)"],
                    pointBackgroundColor: "rgba(75, 192, 192, 1)",
                }, ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1, // Set the step size to 1

                    },
                },
            },
        });
    </script>

</x-app-layout>
