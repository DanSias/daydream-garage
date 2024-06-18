import { ref, computed } from "vue";
import { defineStore } from "pinia";

export const useFilterStore = defineStore('filter', () => {
    let make = ref('');
    let model = ref('');

    let zipcode = ref(0);
    let searchradius = ref(2000);

    let mileagemin = ref(0);
    let mileagemax = ref(3500000);

    let yearmin = ref(1911);
    let yearmax = ref(2077);

    let pricemin = ref(0);
    let pricemax = ref(10000000);

    const filterObject = computed(() => {
        return make != '' ? 'Yes' : 'No'
      })

    return { make, model, zipcode, searchradius, mileagemin, mileagemax, yearmin, yearmax, pricemin, pricemax, filterObject };
});