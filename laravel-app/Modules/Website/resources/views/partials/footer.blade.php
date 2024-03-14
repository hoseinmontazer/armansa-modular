    <!-- footer -->
    <section class="w-[100%] bg-indigo-800 custom-padding">
        <div
            class="primary-container w-[100%] flex flex-col justify-between lg:justify-around items-center py-[1rem] lg:py-[3rem] mx-auto gap-[0.5rem]">
            <div class="text-center text-white texl-lg sm:text-xl lg:text-2xl font-normal my-1">
                {{ $settings['address'] }}</div>
            <div class="w-[40%] flex sm:flex-row justify-center items-center flex-col gap-[0.3rem] lg:gap-[0] my-2">
                <div class="text-right text-white text-2xl font-normal ml-[9px]">
                    {{ $settings['phone1'] }}
                </div>
                <div class="sm:w-[1px] sm:h-[42px] w-[42px] h-[1px] border border-white ml-[9px]"></div>
                <div class="text-right text-white text-2xl font-normal ml-[9px]">
                    {{ $settings['phone2'] }}
                </div>
                <div class="sm:w-[1px] sm:h-[42px] w-[42px] h-[1px] border border-white ml-[9px]"></div>
                <div class="text-right text-white text-2xl font-normal ml-[9px]">
                    {{ $settings['phone3'] }}
                </div>
            </div>
            <div class="lg:w-[35%] flex flex-row justify-center justify-items-center items-center my-1">
                <div class="text-right text-white text-xl font-light font-[300] ml-[9px]">
                    {{ $settings['email'] }}
                </div>
                <div class="xl:w-[34px] xl:h-[34px] w-[24px] h-[24px] flex-col justify-start items-start inline-flex">
                    <img src="{{ asset('assets/modules/website/images/icon/mail.png') }}" />
                </div>
            </div>
            <div class="w-[50%] flex flex-col xl:flex-row justify-around items-center">
                <div
                    class="flex flex-row justify-around xl:justify-center justify-items-center items-center mt-[12px] xl:ml-[12px]">
                    <div class="text-right text-white text-xl font-light font-['IRANSans'] ml-[9px]">
                        {{ $settings['telegram'] }}
                    </div>
                    <div
                        class="xl:w-[34px] xl:h-[34px] w-[24px] h-[24px] flex-col justify-start items-start inline-flex xl:ml-[16px]">
                        <img class="xl:w-[34px] xl:h-[34px] w-[24px] h-[24px]"
                            src="{{ asset('assets/modules/website/images/icon/telegram.png') }}" />
                    </div>
                </div>
                <div class="flex flex-row justify-around xl:justify-center items-center mt-[12px]">
                    <div class="text-right text-white text-xl font-light font-['IRANSans'] ml-[9px]">
                        {{ $settings['instagram'] }}
                    </div>
                    <div
                        class="xl:w-[34px] xl:h-[34px] w-[24px] h-[24px] flex-col justify-start items-start inline-flex xl:ml-[16px]">
                        <img class="xl:w-[34px] xl:h-[34px] w-[24px] h-[24px]"
                            src="{{ asset('assets/modules/website/images/icon/instagram.png') }}" />
                    </div>
                </div>
                <div class="flex flex-row justify-around xl:justify-center items-center mt-[12px]">
                    <div class="text-right text-white text-xl font-light font-['IRANSans'] ml-[9px]">
                        {{ $settings['eitaa'] }}
                    </div>
                    <div
                        class="xl:w-[34px] xl:h-[34px] w-[24px] h-[24px] flex-col justify-start items-start inline-flex xl:ml-[16px]">
                        <img class="xl:w-[34px] xl:h-[34px] w-[24px] h-[24px]"
                            src="{{ asset('assets/modules/website/images/icon/eitaa-icon.png') }}" />
                    </div>
                </div>
            </div>
            <div class="md:mt-[50px] text-center text-white text-base font-normal my-1">
                تمامی حقوق برای مجتمع چاپ آرمانسا محفوظ است.
            </div>
        </div>
    </section>
