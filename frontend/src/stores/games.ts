import { ref } from 'vue'
import { defineStore } from 'pinia'
import axios from 'axios'
import type { Game } from '@/types/game'
import { API_BASE } from '@/utils/constants'

export const useGamesStore = defineStore('games', () => {
    const games = ref<Game[]>([])
    const game = ref<Game>()
    const isLoading = ref(false)
    const error = ref('')

    const handleApiRequest = async (callback: () => Promise<void>, errorMsg: string) => {
        try {
            isLoading.value = true
            error.value = ''

            await callback();
        } catch (err) {
            error.value = errorMsg
            console.error(err)
        } finally {
            isLoading.value = false
        }
    }

    const fetchGames = async () => {
        await handleApiRequest(async () => {
            const response = await axios.get(`${API_BASE}/games`)
            games.value = response.data
        }, 'Fetching for all games failed!')
    }

    const fetchGame = async (id: string | string[] | undefined) => {
        await handleApiRequest(async () => {
            const response = await axios.get(`${API_BASE}/games/${id}`)
            game.value = response.data
        }, 'Fetching for a game failed!')
    }

    const addGame = async (newGame: Game) => {
        await handleApiRequest(async () => {
             const response = await axios.post(`${API_BASE}/games`, newGame)

            if (response) {
                games.value = [...games.value, newGame]
            }
        }, 'Adding a new game failed!')
    }

    const updateGame = async (id: string | string[] | undefined, updatedGame: Game) => {
        await handleApiRequest(async () => {
            const response = await axios.put(`${API_BASE}/games/${id}`, updatedGame)
            
            if (response) {
                game.value = response.data
            }

        }, 'Updating for a game failed!')
    }

    const removeGame = async (id: number) => {
        games.value = games.value.filter(game => game.id !== id)

        await handleApiRequest(async () => {
            games.value = games.value?.filter(game => game.id !== id)

            axios.delete(`${API_BASE}/games/${id}`)
        }, 'Removing a game failed!')
    }

    return {
        games,
        game,
        isLoading,
        error,
        fetchGames,
        fetchGame,
        addGame,
        updateGame,
        removeGame,
    }
})