<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'البرمجة',
                'التصميم الجرافيكي',
                'التسويق الإلكتروني',
                'إدارة الأعمال',
                'تحليل البيانات',
                'الأمن السيبراني',
                'الذكاء الاصطناعي',
                'التصوير الفوتوغرافي',
                'اللغة الإنجليزية',
                'التطوير الشخصي',
                'إدارة المشاريع',
                'الرياضيات',
                'الهندسة المعمارية',
                'الصحة والتغذية',
                'المالية والمحاسبة'
            ]),
            'description' => $this->faker->randomElement([
                'في هذا المجال، ستتعلم كيفية بناء وتطوير البرمجيات باستخدام تقنيات حديثة مثل بايثون وجافا سكريبت.',
                'دورة تعليمية شاملة لتعلم مهارات التصميم الجرافيكي واستخدام أدوات مثل الفوتوشوب وإليستريتور.',
                'اكتشف كيفية استراتيجيات التسويق الإلكتروني التي تساعدك على زيادة المبيعات باستخدام الإعلانات عبر الإنترنت ووسائل التواصل الاجتماعي.',
                'تعلم كيفية إدارة الأعمال بشكل احترافي وتطوير استراتيجيات لزيادة الإنتاجية والكفاءة في بيئة العمل.',
                'دورة لتعلم تحليل البيانات باستخدام أدوات قوية مثل Excel وPython لتقديم رؤى قيمة في الأعمال.',
                'في هذا الكورس، ستتعلم أساسيات الأمن السيبراني وكيفية حماية الأنظمة والشبكات من الهجمات الإلكترونية.',
                'اكتشف عالم الذكاء الاصطناعي وتعلم كيفية تطبيق تقنيات مثل تعلم الآلة لتحسين الأنظمة وحل المشاكل المعقدة.',
                'دورة لتعلم أساسيات التصوير الفوتوغرافي وفن التقاط الصور باستخدام الكاميرات الرقمية وتقنيات التحرير.',
                'دورة لتعلم اللغة الإنجليزية وكيفية استخدامها بفعالية في العمل والحياة اليومية من خلال تقنيات التواصل والتدريب.',
                'تعلم استراتيجيات التطوير الشخصي من خلال تقنيات إدارة الوقت، تحسين الإنتاجية، وتطوير مهارات القيادة.',
                'اكتشف طرق وأساليب إدارة المشاريع من البداية إلى النهاية باستخدام تقنيات مثل Scrum وAgile.',
                'دورة لتعلم الرياضيات من الأساسيات إلى المستويات المتقدمة، مع التركيز على تطبيقات الرياضيات في الحياة العملية.',
                'تعلم كيفية تصميم المباني باستخدام تقنيات الهندسة المعمارية الحديثة وأدوات التصميم ثلاثية الأبعاد.',
                'دورة شاملة حول الصحة والتغذية وكيفية اتباع نمط حياة صحي مع تناول الأطعمة المتوازنة.',
                'تعلم كيفية إدارة الموارد المالية بشكل فعال واحترافي من خلال استخدام تقنيات المحاسبة المالية وتحليل البيانات المالية.'
            ]),
            'img_url' => $this->faker->randomElement(['courses_photos/1.jpg','courses_photos/2.jpg','courses_photos/3.jpg','courses_photos/4.jpg']),
        ];
    }
}
