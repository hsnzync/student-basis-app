<?php

namespace Okipa\LaravelBootstrapComponents\Tests\Unit\Form;

use Exception;
use Illuminate\Support\MessageBag;
use Okipa\LaravelBootstrapComponents\Form\Input;
use Okipa\LaravelBootstrapComponents\Test\BootstrapComponentsTestCase;
use Okipa\LaravelBootstrapComponents\Test\Fakers\UsersFaker;

class ColorTest extends BootstrapComponentsTestCase
{
    use UsersFaker;

    public function testConfigStructure()
    {
        // components.form
        $this->assertTrue(array_key_exists('color', config('bootstrap-components.form')));
        // components.form.color
        $this->assertTrue(array_key_exists('view', config('bootstrap-components.form.color')));
        $this->assertTrue(array_key_exists('icon', config('bootstrap-components.form.color')));
        $this->assertTrue(array_key_exists('legend', config('bootstrap-components.form.color')));
        $this->assertTrue(array_key_exists('class', config('bootstrap-components.form.color')));
        $this->assertTrue(array_key_exists('html_attributes', config('bootstrap-components.form.color')));
        // components.form.color.class
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.form.color.class')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.form.color.class')));
        // components.form.color.html_attributes
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.form.color.html_attributes')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.form.color.html_attributes')));
    }

    public function testExtendsInput()
    {
        $this->assertEquals(Input::class, get_parent_class(bsColor()));
    }

    public function testName()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString('name="name"', $html);
    }

    public function testType()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString('type="color"', $html);
    }

    public function testInputWithoutName()
    {
        $this->expectException(Exception::class);
        bsColor()->toHtml();
    }

    public function testModelValue()
    {
        $user = $this->createUniqueUser();
        $html = bsColor()->model($user)->name('name')->toHtml();
        $this->assertStringContainsString('value="' . $user->name . '"', $html);
    }

    public function testConfigIcon()
    {
        $configIcon = 'test-config-icon';
        config()->set('bootstrap-components.form.color.icon', $configIcon);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString(
            '<span class="icon input-group-text">' . $configIcon . '</span>',
            $html
        );
    }

    public function testSetIcon()
    {
        $configIcon = 'test-config-icon';
        $customIcon = 'test-custom-icon';
        config()->set('bootstrap-components.form.color.icon', $configIcon);
        $html = bsColor()->name('name')->icon($customIcon)->toHtml();
        $this->assertStringContainsString(
            '<span class="icon input-group-text">' . $customIcon . '</span>',
            $html
        );
        $this->assertStringNotContainsString(
            '<span class="icon input-group-text">' . $configIcon . '</span>',
            $html
        );
    }

    public function testNoIcon()
    {
        config()->set('bootstrap-components.form.color.icon', null);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringNotContainsString('<span class="icon input-group-text">', $html);
    }

    public function testHideIcon()
    {
        $configIcon = 'test-config-icon';
        config()->set('bootstrap-components.form.color.icon', $configIcon);
        $html = bsColor()->name('name')->hideIcon()->toHtml();
        $this->assertStringNotContainsString(
            '<span class="icon input-group-text">' . $configIcon . '</span>',
            $html
        );
    }

    public function testConfigLegend()
    {
        $configLegend = 'test-config-legend';
        config()->set('bootstrap-components.form.color.legend', $configLegend);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString(
            '<small id="color-name-legend" class="form-text text-muted">bootstrap-components::'
            . $configLegend . '</small>',
            $html
        );
    }

    public function testSetLegend()
    {
        $configLegend = 'test-config-legend';
        $customLegend = 'test-custom-legend';
        config()->set('bootstrap-components.form.color.legend', $configLegend);
        $html = bsColor()->name('name')->legend($customLegend)->toHtml();
        $this->assertStringContainsString(
            '<small id="color-name-legend" class="form-text text-muted">' . $customLegend . '</small>',
            $html
        );
        $this->assertStringNotContainsString(
            '<small id="color-name-legend" class="form-text text-muted">bootstrap-components::'
            . $configLegend . '</small>',
            $html
        );
    }

    public function testNoLegend()
    {
        config()->set('bootstrap-components.form.color.legend', null);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringNotContainsString(
            '<small id="color-name-legend" class="form-text text-muted">',
            $html
        );
    }

    public function testHideLegend()
    {
        $configLegend = 'test-config-legend';
        config()->set('bootstrap-components.form.color.legend', $configLegend);
        $html = bsColor()->name('name')->hideLegend()->toHtml();
        $this->assertStringNotContainsString(
            '<small id="color-name-legend" class="form-text text-muted">',
            $html
        );
    }

    public function testSetValue()
    {
        $customValue = 'test-custom-value';
        $html = bsColor()->name('name')->value($customValue)->toHtml();
        $this->assertStringContainsString('value="' . $customValue . '"', $html);
    }

    public function testOldValue()
    {
        $oldValue = 'test-old-value';
        $customValue = 'test-custom-value';
        $this->app['router']->get('test', [
            'middleware' => 'web', 'uses' => function () use ($oldValue) {
                $request = request()->merge(['name' => $oldValue]);
                $request->flash();
            },
        ]);
        $this->call('GET', 'test');
        $html = bsColor()->name('name')->value($customValue)->toHtml();
        $this->assertStringContainsString('value="' . $oldValue . '"', $html);
        $this->assertStringNotContainsString('value="' . $customValue . '"', $html);
    }

    public function testSetLabel()
    {
        $label = 'test-custom-label';
        $html = bsColor()->name('name')->label($label)->toHtml();
        $this->assertStringContainsString('<label for="color-name">' . $label . '</label>', $html);
        $this->assertStringContainsString('placeholder="' . $label . '"', $html);
        $this->assertStringContainsString('aria-label="' . $label . '"', $html);
    }

    public function testNoLabel()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString(
            '<label for="color-name">validation.attributes.name</label>',
            $html
        );
        $this->assertStringContainsString(
            'aria-label="validation.attributes.name"',
            $html
        );
    }

    public function testHideLabel()
    {
        $html = bsColor()->name('name')->hideLabel()->toHtml();
        $this->assertStringNotContainsString(
            '<label for="color-name">validation.attributes.name</label>',
            $html
        );
        $this->assertStringNotContainsString(
            'aria-label="validation.attributes.name"',
            $html
        );
    }

    public function testSetPlaceholder()
    {
        $placeholder = 'test-custom-placeholder';
        $html = bsColor()->name('name')->placeholder($placeholder)->toHtml();
        $this->assertStringContainsString('placeholder="' . $placeholder . '"', $html);
    }

    public function testSetPlaceholderWithLabel()
    {
        $label = 'test-custom-label';
        $placeholder = 'test-custom-placeholder';
        $html = bsColor()->name('name')->label($label)->placeholder($placeholder)->toHtml();
        $this->assertStringContainsString('placeholder="' . $placeholder . '"', $html);
    }

    public function testNoPlaceholder()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString('placeholder="validation.attributes.name"', $html);
    }

    public function testSuccess()
    {
        $messageBag = app(MessageBag::class)->add('other_name', null);
        $html = bsColor()->name('name')->render(['errors' => $messageBag]);
        $this->assertStringContainsString('<div class="valid-feedback d-block">', $html);
        $this->assertStringContainsString(
            trans('bootstrap-components::bootstrap-components.notification.validation.success'),
            $html
        );
    }

    public function testNoSuccess()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringNotContainsString('<div class="valid-feedback d-block">', $html);
    }

    public function testError()
    {
        $errorMessage = 'This a test error message';
        $messageBag = app(MessageBag::class)->add('name', $errorMessage);
        $html = bsColor()->name('name')->render(['errors' => $messageBag]);
        $this->assertStringContainsString('<div class="invalid-feedback d-block">', $html);
        $this->assertStringContainsString($errorMessage, $html);
    }

    public function testNoError()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringNotContainsString('<div class="invalid-feedback d-block">', $html);
    }

    public function testSetNoContainerId()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringNotContainsString('<div id="', $html);
    }

    public function testSetContainerId()
    {
        $customContainerId = 'test-custom-container-id';
        $html = bsColor()->name('name')->containerId($customContainerId)->toHtml();
        $this->assertStringContainsString('<div id="' . $customContainerId . '"', $html);
    }

    public function testSetNoComponentId()
    {
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString('for="color-name"', $html);
        $this->assertStringContainsString('<input id="color-name"', $html);
    }

    public function testSetComponentId()
    {
        $customComponentId = 'test-custom-component-id';
        $html = bsColor()->name('name')->componentId($customComponentId)->toHtml();
        $this->assertStringContainsString('for="' . $customComponentId . '"', $html);
        $this->assertStringContainsString('<input id="' . $customComponentId . '"', $html);
    }

    public function testConfigContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        config()->set('bootstrap-components.form.color.class.container', [$configContainerCLass]);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString(
            'class="color-name-container ' . $configContainerCLass . '"',
            $html
        );
    }

    public function testSetContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        $customContainerCLass = 'test-custom-class-container';
        config()->set('bootstrap-components.form.color.class.container', [$configContainerCLass]);
        $html = bsColor()->name('name')->containerClass([$customContainerCLass])->toHtml();
        $this->assertStringContainsString(
            'class="color-name-container ' . $customContainerCLass . '"',
            $html
        );
        $this->assertStringNotContainsString(
            'class="color-name-container ' . $configContainerCLass . '"',
            $html
        );
    }

    public function testConfigComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        config()->set('bootstrap-components.form.color.class.component', [$configComponentCLass]);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString(
            'class="form-control color-name-component ' . $configComponentCLass . '"',
            $html
        );
    }

    public function testSetComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        $customComponentCLass = 'test-custom-class-component';
        config()->set('bootstrap-components.form.color.class.component', [$customComponentCLass]);
        $html = bsColor()->name('name')->componentClass([$customComponentCLass])->toHtml();
        $this->assertStringContainsString(
            'class="form-control color-name-component ' . $customComponentCLass . '"',
            $html
        );
        $this->assertStringNotContainsString(
            'class="form-control color-name-component ' . $configComponentCLass . '"',
            $html
        );
    }

    public function testConfigContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        config()->set('bootstrap-components.form.color.html_attributes.container', [$configContainerAttributes]);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString($configContainerAttributes, $html);
    }

    public function testSetContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        $customContainerAttributes = 'test-custom-attributes-container';
        config()->set('bootstrap-components.form.color.html_attributes.container', [$configContainerAttributes]);
        $html = bsColor()->name('name')->containerHtmlAttributes([$customContainerAttributes])->toHtml();
        $this->assertStringContainsString($customContainerAttributes, $html);
        $this->assertStringNotContainsString($configContainerAttributes, $html);
    }

    public function testConfigComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        config()->set('bootstrap-components.form.color.html_attributes.component', [$configComponentAttributes]);
        $html = bsColor()->name('name')->toHtml();
        $this->assertStringContainsString($configComponentAttributes, $html);
    }

    public function testSetComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        $customComponentAttributes = 'test-custom-attributes-component';
        config()->set('bootstrap-components.form.color.html_attributes.component', [$configComponentAttributes]);
        $html = bsColor()->name('name')->componentHtmlAttributes([$customComponentAttributes])->toHtml();
        $this->assertStringContainsString($customComponentAttributes, $html);
        $this->assertStringNotContainsString($configComponentAttributes, $html);
    }
}
