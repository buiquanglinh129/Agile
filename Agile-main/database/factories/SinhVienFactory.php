<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SinhVien>
 */
class SinhVienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ma_sv' => 'SV' . $this->faker->unique()->numerify('######'), // VD: SV123456
            'ten' => $this->faker->name(),
            'lop' => 'Lớp ' . $this->faker->randomElement(['A', 'B', 'C']) . $this->faker->numberBetween(1, 9),
            'diem_tb' => $this->faker->randomFloat(2, 0, 10), // điểm từ 0.00 đến 10.00
            'chuyen_nganh' => $this->faker->randomElement(['CNTT', 'QTKD', 'Tài chính', 'Kế toán']),
            'ky_hoc' => $this->faker->numberBetween(1, 6),
        ];
    }
}
