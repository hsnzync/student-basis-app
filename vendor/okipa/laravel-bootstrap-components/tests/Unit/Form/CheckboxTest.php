<?php

namespace Okipa\LaravelBootstrapComponents\Tests\Unit\Form;

use Exception;
use Illuminate\Support\MessageBag;
use Okipa\LaravelBootstrapComponents\Form\Checkable;
use Okipa\LaravelBootstrapComponents\Test\BootstrapComponentsTestCase;
use Okipa\LaravelBootstrapComponents\Test\Fakers\UsersFaker;

class CheckboxTest extends BootstrapComponentsTestCase
{
    use UsersFaker;

    public function testConfigStructure()
    {
        // components.form
        $this->assertTrue(array_key_exists('checkbox', config('bootstrap-components.form')));
        // components.form.checkbox
        $this->assertTrue(array_key_exists('view', config('bootstrap-components.form.checkbox')));
        $this->assertTrue(array_key_exists('icon', config('bootstrap-components.form.checkbox')));
        $this->assertTrue(array_key_exists('legend', config('bootstrap-components.form.checkbox')));
        $this->assertTrue(array_key_exists('class', config('bootstrap-components.form.checkbox')));
        $this->assertTrue(array_key_exists('html_attributes', config('bootstrap-components.form.checkbox')));
        // components.form.checkbox.class
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.form.checkbox.class')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.form.checkbox.class')));
        // components.form.checkbox.html_attributes
        $this->assertTrue(array_key_exists('container', config('bootstrap-components.form.checkbox.html_attributes')));
        $this->assertTrue(array_key_exists('component', config('bootstrap-components.form.checkbox.html_attributes')));
    }

    public function testExtendsInput()
    {
        $this->assertEquals(Checkable::class, get_parent_class(bsCheckbox()));
    }

    public function testName()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString('name="name"', $html);
    }

    public function testType()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString('type="checkbox"', $html);
    }

    public function testInputWithoutName()
    {
        $this->expectException(Exception::class);
        bsCheckbox()->toHtml();
    }

    public function testModelValue()
    {
        $user = $this->createUniqueUser();
        $html = bsCheckbox()->model($user)->name('name')->toHtml();
        $this->assertStringContainsString('checked="checked"', $html);
    }

    public function testConfigIcon()
    {
        $configIcon = 'test-config-icon';
        config()->set('bootstrap-components.form.checkbox.icon', $configIcon);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString(
            '<label class="custom-control-label" for="checkbox-name"><span class="label-icon">'
            . $configIcon . '</span> validation.attributes.name</label>',
            $html
        );
    }

    public function testSetIcon()
    {
        $configIcon = 'test-config-icon';
        $customIcon = 'test-custom-icon';
        config()->set('bootstrap-components.form.checkbox.icon', $configIcon);
        $html = bsCheckbox()->name('name')->icon($customIcon)->toHtml();
        $this->assertStringNotContainsString(
            '<label class="custom-control-label" for="checkbox-name"><span class="label-icon">'
            . $configIcon . '</span> validation.attributes.name</label>',
            $html
        );
        $this->assertStringContainsString(
            '<label class="custom-control-label" for="checkbox-name"><span class="label-icon">'
            . $customIcon . '</span> validation.attributes.name</label>',
            $html
        );
    }

    public function testNoIcon()
    {
        config()->set('bootstrap-components.form.checkbox.icon', null);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringNotContainsString('<span class="label-icon">', $html);
    }

    public function testChecked()
    {
        $user = null;
        $html = bsCheckbox()->model($user)->name('name')->checked(true)->toHtml();
        $this->assertStringContainsString('checked="checked"', $html);
    }

    public function testNotChecked()
    {
        $user = $this->createUniqueUser();
        $html = bsCheckbox()->model($user)->name('name')->checked(false)->toHtml();
        $this->assertStringNotContainsString('checked="checked"', $html);
    }

    public function testConfigLegend()
    {
        $configLegend = 'test-config-legend';
        config()->set('bootstrap-components.form.checkbox.legend', $configLegend);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString(
            '<small id="checkbox-name-legend" class="form-text text-muted">bootstrap-components::'
            . $configLegend . '</small>',
            $html
        );
    }

    public function testSetLegend()
    {
        $configLegend = 'test-config-legend';
        $customLegend = 'test-custom-legend';
        config()->set('bootstrap-components.form.checkbox.legend', $configLegend);
        $html = bsCheckbox()->name('name')->legend($customLegend)->toHtml();
        $this->assertStringContainsString(
            '<small id="checkbox-name-legend" class="form-text text-muted">' . $customLegend . '</small>',
            $html
        );
        $this->assertStringNotContainsString(
            '<small id="checkbox-name-legend" class="form-text text-muted">bootstrap-components::'
            . $configLegend . '</small>',
            $html
        );
    }

    public function testNoLegend()
    {
        config()->set('bootstrap-components.form.checkbox.legend', null);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringNotContainsString(
            '<small id="checkbox-name-legend" class="form-text text-muted">',
            $html
        );
    }

    public function testHideLegend()
    {
        $configLegend = 'test-config-legend';
        config()->set('bootstrap-components.form.checkbox.legend', $configLegend);
        $html = bsCheckbox()->name('name')->hideLegend()->toHtml();
        $this->assertStringNotContainsString(
            '<small id="checkbox-name-legend" class="form-text text-muted">',
            $html
        );
    }

    public function testSetValueDefaultCheckStatus()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringNotContainsString('checked="checked', $html);
    }

    public function testSetValueChecked()
    {
        $customValue = true;
        $html = bsCheckbox()->name('name')->value($customValue)->toHtml();
        $this->assertStringContainsString('checked="checked', $html);
    }

    public function testOldValueChecked()
    {
        $oldValue = true;
        $customValue = false;
        $this->app['router']->get('test', [
            'middleware' => 'web', 'uses' => function () use ($oldValue) {
                $request = request()->merge(['name' => $oldValue]);
                $request->flash();
            },
        ]);
        $this->call('GET', 'test');
        $html = bsCheckbox()->name('name')->value($customValue)->toHtml();
        $this->assertStringContainsString('checked="checked', $html);
    }

    public function testOldValueNotChecked()
    {
        $oldValue = false;
        $customValue = true;
        $this->app['router']->get('test', [
            'middleware' => 'web', 'uses' => function () use ($oldValue) {
                $request = request()->merge(['name' => $oldValue]);
                $request->flash();
            },
        ]);
        $this->call('GET', 'test');
        $html = bsCheckbox()->name('name')->value($customValue)->toHtml();
        $this->assertStringNotContainsString('checked="checked', $html);
    }

    public function testSetLabel()
    {
        $label = 'test-custom-label';
        $html = bsCheckbox()->name('name')->label($label)->toHtml();
        $this->assertStringContainsString('for="checkbox-name">' . $label . '</label>', $html);
    }

    public function testNoLabel()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString(
            'for="checkbox-name">validation.attributes.name</label>',
            $html
        );
    }

    public function testHideLabel()
    {
        $html = bsCheckbox()->name('name')->hideLabel()->toHtml();
        $this->assertStringNotContainsString(
            'for="checkbox-name">validation.attributes.name</label>',
            $html
        );
    }

    public function testSuccess()
    {
        $messageBag = app(MessageBag::class)->add('other_name', null);
        $html = bsCheckbox()->name('name')->render(['errors' => $messageBag]);
        $this->assertStringContainsString('<div class="valid-feedback d-block">', $html);
        $this->assertStringContainsString(
            trans('bootstrap-components::bootstrap-components.notification.validation.success'),
            $html
        );
    }

    public function testNoSuccess()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringNotContainsString('<div class="valid-feedback d-block">', $html);
    }

    public function testError()
    {
        $errorMessage = 'This a test error message';
        $messageBag = app(MessageBag::class)->add('name', $errorMessage);
        $html = bsCheckbox()->name('name')->render(['errors' => $messageBag]);
        $this->assertStringContainsString('<div class="invalid-feedback d-block">', $html);
        $this->assertStringContainsString($errorMessage, $html);
    }

    public function testNoError()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringNotContainsString('<div class="invalid-feedback d-block">', $html);
    }

    public function testSetNoContainerId()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringNotContainsString('<div id="', $html);
    }

    public function testSetContainerId()
    {
        $customContainerId = 'test-custom-container-id';
        $html = bsCheckbox()->name('name')->containerId($customContainerId)->toHtml();
        $this->assertStringContainsString('<div id="' . $customContainerId, $html);
    }

    public function testSetNoComponentId()
    {
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString('for="checkbox-name"', $html);
        $this->assertStringContainsString('<input id="checkbox-name"', $html);
    }

    public function testSetComponentId()
    {
        $customComponentId = 'test-custom-component-id';
        $html = bsCheckbox()->name('name')->componentId($customComponentId)->toHtml();
        $this->assertStringContainsString('for="' . $customComponentId . '"', $html);
        $this->assertStringContainsString('<input id="' . $customComponentId . '"', $html);
    }

    public function testConfigContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        config()->set('bootstrap-components.form.checkbox.class.container', [$configContainerCLass]);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString(
            'class="checkbox-name-container custom-control custom-checkbox '
            . $configContainerCLass
            . '"',
            $html
        );
    }

    public function testSetContainerClass()
    {
        $configContainerCLass = 'test-config-class-container';
        $customContainerCLass = 'test-custom-class-container';
        config()->set('bootstrap-components.form.checkbox.class.container', [$configContainerCLass]);
        $html = bsCheckbox()->name('name')->containerClass([$customContainerCLass])->toHtml();
        $this->assertStringContainsString(
            'class="checkbox-name-container custom-control custom-checkbox ' . $customContainerCLass . '"',
            $html
        );
        $this->assertStringNotContainsString(
            'class="checkbox-name-container custom-control custom-checkbox ' . $configContainerCLass . '"',
            $html
        );
    }

    public function testConfigComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        config()->set('bootstrap-components.form.checkbox.class.component', [$configComponentCLass]);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString(
            'class="checkbox-name-component custom-control-input ' . $configComponentCLass . '"',
            $html
        );
    }

    public function testSetComponentClass()
    {
        $configComponentCLass = 'test-config-class-component';
        $customComponentCLass = 'test-custom-class-component';
        config()->set('bootstrap-components.form.checkbox.class.component', [$customComponentCLass]);
        $html = bsCheckbox()->name('name')->componentClass([$customComponentCLass])->toHtml();
        $this->assertStringContainsString(
            'class="checkbox-name-component custom-control-input ' . $customComponentCLass . '"',
            $html
        );
        $this->assertStringNotContainsString(
            'class="form-control checkbox-name-component ' . $configComponentCLass . '"',
            $html
        );
    }

    public function testConfigContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        config()->set('bootstrap-components.form.checkbox.html_attributes.container', [$configContainerAttributes]);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString($configContainerAttributes, $html);
    }

    public function testSetContainerHtmlAttributes()
    {
        $configContainerAttributes = 'test-config-attributes-container';
        $customContainerAttributes = 'test-custom-attributes-container';
        config()->set('bootstrap-components.form.checkbox.html_attributes.container', [$configContainerAttributes]);
        $html = bsCheckbox()->name('name')->containerHtmlAttributes([$customContainerAttributes])->toHtml();
        $this->assertStringContainsString($customContainerAttributes, $html);
        $this->assertStringNotContainsString($configContainerAttributes, $html);
    }

    public function testConfigComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        config()->set('bootstrap-components.form.checkbox.html_attributes.component', [$configComponentAttributes]);
        $html = bsCheckbox()->name('name')->toHtml();
        $this->assertStringContainsString($configComponentAttributes, $html);
    }

    public function testSetComponentHtmlAttributes()
    {
        $configComponentAttributes = 'test-config-attributes-component';
        $customComponentAttributes = 'test-custom-attributes-component';
        config()->set('bootstrap-components.form.checkbox.html_attributes.component', [$configComponentAttributes]);
        $html = bsCheckbox()->name('name')->componentHtmlAttributes([$customComponentAttributes])->toHtml();
        $this->assertStringContainsString($customComponentAttributes, $html);
        $this->assertStringNotContainsString($configComponentAttributes, $html);
    }
}
