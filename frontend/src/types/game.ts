export interface Game {
    title: string;
    platform_id: number;
    is_physical: boolean;
    is_digital: boolean;
    genre_id: number;
    publisher_id: number;
    release: number;
    id?: number;
    href?: string;
}