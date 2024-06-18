import { ref, computed } from "vue";
import { defineStore } from "pinia";
import { useFilterStore } from "./Filter";

import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

export const useGarageStore = defineStore('garage', () => {
    let car = ref({});
    let results = ref([]);
    let saved = ref([]);
    let ignored = ref([]);
    let loading = ref(false)

    let note = ref('');
    let category = ref('');

    const yearsOld = (car) => {
        let thisYear = new Date().getFullYear()
        return thisYear - car.year;
    }

    const getSearchResults = (start = 0) => {
        const filterStore = useFilterStore();
        let filter = {
            make: filterStore.make,
            model: filterStore.model,
            start: start,
            zipcode: filterStore.zipcode,
            searchradius: filterStore.searchradius,
            mileagemin: filterStore.mileagemin,
            mileagemax: filterStore.mileagemax,
            yearmin: filterStore.yearmin,
            yearmax: filterStore.yearmax,
            pricemin: filterStore.pricemin,
            pricemax: filterStore.pricemax,
        };
        loading = true
        axios.get("/search", { params: filter }).then((response) => {
            if (start == 0) {
                return results.value = response.data;
            }
            results.value = results.value.concat(response.data)
            loading = false
        });
    };

    const loadMore = (currentCount) => {
        getSearchResults(currentCount)
        return toast.success("Loading More Cars..." , {
            autoClose: 1000,
            theme: 'dark',
            position: toast.POSITION.TOP_CENTER,
        });
    };

    const saveCar = (car, user) => {
        car.user_id = user.id;
        car.type = 'save';
        car.category = 'save';
        car.note = 'save';
        axios.post("/api/save", car).then(response => {
            notify('save'); 
            getSaves(user)
        });
    };
    
    const ignoreCar = (car, user) => {
        car.user_id = user.id;
        car.type = 'ignore';
        car.category = 'ignore';
        car.note = 'ignore';
        axios.post("/api/save", car).then(response => {
            notify('ignore')
            getSaves(user)
        });
    };

    const deleteCar = (id) => {
        axios.delete("/api/save/" + id).then(response => {
            notify('delete')
            getSaves(user)
        });
    }

    const getSaves = (user) => {
        axios.get('/api/save/' + user.id).then(response => {
            saved.value = response.data
        });
    }

    const notify = (type) => {
        if (type == 'save') {
            return toast.success("Car Saved to Garage!", {
                autoClose: 1000,
                theme: 'dark',
                position: toast.POSITION.TOP_CENTER,
            });
        } else if (type == 'ignore') {
            return toast.error("Car Will be Ignored...", {
                autoClose: 1000,
                theme: 'dark',
                position: toast.POSITION.TOP_CENTER,
            });
        } else if (type == 'delete') {
            return toast.error("Car Has Been Deleted...", {
                autoClose: 1000,
                theme: 'dark',
                position: toast.POSITION.TOP_CENTER,
            });
        }
        
      }


    return { car, results, saved, ignored, note, category, loadMore, yearsOld, getSearchResults, saveCar, ignoreCar, deleteCar };
});