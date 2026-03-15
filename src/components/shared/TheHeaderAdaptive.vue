<script setup lang="ts">
import LogoIcon from '../icons/LogoIcon.vue'
import AddressIcon from '../icons/AddressIcon.vue'
import ProfileIcon from '../icons/ProfileIcon.vue'
import CartIcon from '../icons/CartIcon.vue'
import SearchIcon from '../icons/SearchIcon.vue'
import MaxIcon from '../icons/MaxIcon.vue'
const emit = defineEmits<{
  menuClick: []
  authClick: []
  callbackClick: []
  searchClick: []
}>()
</script>

<template>
  <header class="header-adaptive">
    <div class="header-adaptive__top">
      <div class="header-adaptive__top-inner">
        <RouterLink to="/" class="header-adaptive__logo-link">
          <LogoIcon class="header-adaptive__logo" />
        </RouterLink>
        <div class="header-adaptive__top-right">
          <div class="header-adaptive__phone-block">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="10"
              height="10"
              viewBox="0 0 10 10"
              fill="none"
              class="header-adaptive__phone-icon"
            >
              <path
                d="M9.50931 7.18188L8.14365 5.81623C7.65592 5.32849 6.82677 5.52361 6.63167 6.15764C6.48535 6.59662 5.99762 6.84049 5.55866 6.74292C4.58319 6.49906 3.26631 5.23095 3.02244 4.20671C2.87612 3.76773 3.16876 3.27999 3.60772 3.13369C4.24178 2.9386 4.43687 2.10945 3.94914 1.62172L2.58348 0.25606C2.19329 -0.0853535 1.60801 -0.0853535 1.2666 0.25606L0.339905 1.18276C-0.586789 2.15822 0.437452 4.74321 2.7298 7.03556C5.02215 9.32791 7.60714 10.4009 8.58261 9.42546L9.50931 8.49877C9.85074 8.10858 9.85074 7.5233 9.50931 7.18188Z"
                fill="#FDC043"
              />
            </svg>
            <div class="header-adaptive__phone-text">
              <span>+7 966 032 02 30</span>
              <p class="header-adaptive__phone-text-link" @click="emit('callbackClick')">
                Заказать звонок
              </p>
            </div>
            <div class="header-adaptive__socials">
              <a href="#" class="header-adaptive__social-link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                >
                  <path
                    d="M7.84302 15.686C12.1746 15.686 15.686 12.1746 15.686 7.84302C15.686 3.51144 12.1746 0 7.84302 0C3.51144 0 0 3.51144 0 7.84302C0 12.1746 3.51144 15.686 7.84302 15.686Z"
                    fill="#29A71A"
                  />
                  <path
                    d="M11.3011 4.38499C10.4851 3.56084 9.40146 3.05542 8.24563 2.95989C7.0898 2.86436 5.93788 3.18501 4.99764 3.864C4.05741 4.54298 3.39075 5.53561 3.11793 6.66284C2.84511 7.79006 2.98408 8.97767 3.50978 10.0115L2.99374 12.5168C2.98839 12.5417 2.98824 12.5675 2.9933 12.5925C2.99836 12.6175 3.00852 12.6412 3.02315 12.662C3.04459 12.6937 3.07518 12.7182 3.11086 12.732C3.14653 12.7459 3.18558 12.7485 3.22279 12.7396L5.67819 12.1576C6.70907 12.67 7.8883 12.8 9.00606 12.5246C10.1238 12.2491 11.1076 11.586 11.7823 10.6533C12.4571 9.72059 12.779 8.57874 12.6909 7.43092C12.6028 6.2831 12.1103 5.20377 11.3011 4.38499ZM10.5355 10.4954C9.97093 11.0584 9.24391 11.4301 8.45691 11.558C7.66991 11.6859 6.86261 11.5636 6.14877 11.2084L5.80653 11.0391L4.30121 11.3956L4.30567 11.3769L4.6176 9.86173L4.45005 9.53107C4.08531 8.81475 3.95665 8.00137 4.08248 7.20744C4.20832 6.41351 4.5822 5.67978 5.15057 5.11136C5.86474 4.39741 6.83322 3.99634 7.84305 3.99634C8.85287 3.99634 9.82135 4.39741 10.5355 5.11136C10.5416 5.11833 10.5482 5.12488 10.5551 5.13096C11.2604 5.84675 11.6542 6.81234 11.6505 7.81723C11.6468 8.82211 11.246 9.7848 10.5355 10.4954Z"
                    fill="white"
                  />
                  <path
                    d="M10.4021 9.38421C10.2176 9.67476 9.92618 10.0304 9.55987 10.1186C8.91817 10.2737 7.93334 10.1239 6.70787 8.98136L6.69271 8.96799C5.61519 7.9689 5.33534 7.13736 5.40307 6.47783C5.44051 6.10351 5.75244 5.76483 6.01536 5.5438C6.05693 5.50833 6.10622 5.48307 6.1593 5.47005C6.21237 5.45703 6.26775 5.45661 6.32102 5.46882C6.37429 5.48103 6.42396 5.50554 6.46606 5.54038C6.50816 5.57522 6.54152 5.61943 6.56348 5.66947L6.96009 6.56072C6.98586 6.61851 6.99541 6.68222 6.98772 6.74503C6.98003 6.80784 6.95538 6.86736 6.91642 6.91722L6.71589 7.17747C6.67286 7.2312 6.6469 7.29659 6.64134 7.3652C6.63578 7.43382 6.65088 7.50253 6.68469 7.56249C6.79699 7.75945 7.06615 8.04911 7.36472 8.31738C7.69983 8.6204 8.07148 8.89758 8.30677 8.99206C8.36973 9.01778 8.43895 9.02405 8.50551 9.01007C8.57207 8.9961 8.63292 8.9625 8.68021 8.91363L8.91282 8.67923C8.95771 8.63497 9.01353 8.6034 9.07459 8.58774C9.13565 8.57209 9.19977 8.5729 9.26041 8.5901L10.2025 8.85748C10.2544 8.87342 10.3021 8.90103 10.3417 8.9382C10.3814 8.97538 10.412 9.02113 10.4313 9.07195C10.4505 9.12278 10.4579 9.17734 10.4529 9.23146C10.4478 9.28558 10.4305 9.33783 10.4021 9.38421Z"
                    fill="white"
                  />
                </svg>
              </a>
              <a href="#" class="header-adaptive__social-link">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  viewBox="0 0 16 16"
                  fill="none"
                >
                  <path
                    d="M7.51622 15.686C11.6673 15.686 15.0324 12.1746 15.0324 7.84302C15.0324 3.51144 11.6673 0 7.51622 0C3.36513 0 0 3.51144 0 7.84302C0 12.1746 3.36513 15.686 7.51622 15.686Z"
                    fill="#039BE5"
                  />
                  <path
                    d="M3.43909 7.67301L10.686 4.75736C11.0223 4.63057 11.3161 4.84298 11.2071 5.37369L11.2077 5.37304L9.97382 11.439C9.88237 11.869 9.63747 11.9736 9.29485 11.771L7.4158 10.3259L6.50946 11.237C6.40925 11.3416 6.32469 11.4298 6.13052 11.4298L6.26393 9.43442L9.74645 6.15146C9.89803 6.01225 9.71263 5.93382 9.51282 6.07238L5.20916 8.89978L3.3539 8.29587C2.95116 8.16254 2.94239 7.87562 3.43909 7.67301Z"
                    fill="white"
                  />
                </svg>
              </a>
              <a href="#">
                <MaxIcon />
              </a>
            </div>
          </div>
          <button
            type="button"
            class="header-adaptive__search-button"
            @click="emit('searchClick')"
            aria-label="Поиск"
          >
            <SearchIcon />
          </button>
        </div>
      </div>
    </div>
    <div class="header-adaptive__bottom">
      <div class="header-adaptive__bottom-inner">
        <div class="header-adaptive__location">
          <AddressIcon class="header-adaptive__location-icon" />
          <span class="header-adaptive__location-text">Владивосток</span>
        </div>
        <div class="header-adaptive__actions">
          <RouterLink to="/cart" class="header-adaptive__cart-link">
            <CartIcon class="header-adaptive__cart-icon" />
            <span class="header-adaptive__cart-count">(10)</span>
          </RouterLink>
          <button type="button" class="header-adaptive__profile-link" @click="emit('authClick')">
            <ProfileIcon class="header-adaptive__profile-icon" />
            <span class="header-adaptive__profile-text">Войти</span>
          </button>
        </div>
        <button
          type="button"
          class="header-adaptive__menu-button"
          aria-label="Меню"
          @click="emit('menuClick')"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="18"
            height="16"
            viewBox="0 0 18 16"
            fill="none"
          >
            <rect width="17.8467" height="2.87183" rx="1.43591" fill="#FDC043" />
            <rect
              x="4.18213"
              y="6.12451"
              width="13.6647"
              height="2.87183"
              rx="1.43591"
              fill="#FDC043"
            />
            <rect y="12.2485" width="17.8467" height="2.87183" rx="1.43591" fill="#FDC043" />
          </svg>
        </button>
      </div>
    </div>
  </header>
</template>

<style scoped lang="scss">
.header-adaptive {
  &__top {
    background-color: $color-dark;
    padding: 10px 0;
    color: $color-white;
  }

  &__bottom {
    background-color: $color-white;
    padding: 10px 0;
    display: flex;
    align-items: center;
    font-weight: 500;
    font-size: 16px;
  }

  &__top-inner,
  &__bottom-inner {
    max-width: 1187px;
    // margin: 0 auto;
    width: 100%;
    padding: 0 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 23px;
    position: relative;

    @include bp($point_4) {
      padding: 0 16px;
    }
  }

  &__phone-icon {
    margin-top: 5.5px;
  }

  &__logo-link {
    display: inline-flex;
  }

  &__top-right {
    display: flex;
    align-items: center;
    gap: 40px;
  }

  &__phone-block {
    display: flex;
    gap: 10px;
  }

  &__phone-text {
    font-weight: 600;
    font-size: 14px;
  }

  &__phone-text-link {
    font-size: 14px;
    font-weight: 400;
    text-decoration: underline;
    color: $color-yellow;
    margin-top: -4px;
    background: transparent;
    border: none;
    padding: 0;
    cursor: pointer;
    font: inherit;
  }

  &__socials {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding-top: 3px;
  }

  &__social-link {
    @include flex-center;
  }

  &__search-button {
    @include flex-center;
    width: 18px;
    height: 18px;
    background: transparent;
    border: none;
    cursor: pointer;
    color: $color-yellow;
  }

  &__location {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  &__location-icon {
    @include flex-center;
  }

  &__location-text {
    font-size: 16px;
    font-weight: 500;
    color: $color-dark;
  }

  &__actions {
    display: flex;
    align-items: center;
    gap: 24px;
  }

  &__cart-link,
  &__profile-link {
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    font: inherit;
    color: inherit;
  }

  &__cart-count,
  &__profile-text {
    font-size: 16px;
    font-weight: 500;
    color: $color-dark;
  }

  &__menu-button {
    @include flex-center;
    background: transparent;
    border: none;
    cursor: pointer;
  }
}
</style>
